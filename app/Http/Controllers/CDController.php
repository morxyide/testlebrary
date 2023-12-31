<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CD;
use Illuminate\Support\Facades\Auth;

class CDController extends Controller
{
    public function index()
    {
        $cds = CD::all();
        return view('cds.index', compact('cds'));
    }

    public function create()
    {
        return view('cds.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'artist' => 'required|string|max:255',
            'publisher' => 'required|string|max:255',
            'year_published' => 'required|integer',
            'category' => 'required|string',
            'description' => 'required|string',
            'quantity' => 'required|integer',
        ]);

        CD::create($data);

        return redirect()->route('cds.index')->with('success', 'CD created successfully!');
    }

    public function edit(CD $cd)
    {
        return view('cds.edit', compact('cd'));
    }

    public function update(Request $request, CD $cd)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
        ]);
        
        $cd->update($data);

        return redirect()->route('cds.index')->with('success', 'CD updated successfully!');
    }

    public function destroy(CD $cd)
    {
        $cd->delete();

        return redirect()->route('cds.index')->with('success', 'CD deleted successfully!');
    }

    public function borrow(Request $request, CD $cd)
    {
        $user_id = Auth::user()->id;
        $borrowed_at = now();
        $days = $request->input('days');
        $return_by = $borrowed_at->addDays($days);

        $cd->borrowings()->create([
            'user_id' => $user_id,
            'borrowable_type' => 'App\Models\CD',
            'borrowable_id' => $cd->id,
            'borrowed_at' => $borrowed_at,
            'return_by' => $return_by,
        ]);

        return redirect()->route('cds.index')->with('success', 'CD borrowed successfully!');
    }
}
