<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Magazine;
use Illuminate\Support\Facades\Auth;

class MagazineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $magazines = Magazine::all();
        return view('magazines.index', ['magazines' => $magazines]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('magazines.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'publisher' => 'required|string|max:255',
            'issn' => 'required|string|max:13',
            'edition' => 'required|integer',
            'year_published' => 'required|integer',
            'category' => 'required|string|max:255',
            'description' => 'required|string',
            'quantity' => 'required|integer',
        ]);

        Magazine::create($data);

        return redirect()->route('magazines.index')->with('success', 'Magazine created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Magazine $magazine)
    {
        return view('magazines.edit', compact('magazine'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Magazine $magazine)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $magazine->update($data);

        return redirect()->route('magazines.index')->with('success', 'Magazine updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Magazine $magazine)
    {
        $magazine->delete();

        return redirect()->route('magazines.index')->with('success', 'Magazine deleted successfully!');
    }

    public function borrow(Request $request, Magazine $magazine)
    {
        $user = Auth::user();
        $borrowed_at = now();
        $days = $request->input('days');
        $return_by = now()->addDays($days);

        $magazine->borrowings()->create([
            'user_id' => $user->id,
            'borrowable_type', Magazine::class,
            'borrowable_id' => $magazine->id,
            'borrowed_at' => $borrowed_at,
            'return_by' => $return_by,
        ]);

        return redirect()->route('magazines.index')->with('success', 'Magazine borrowed successfully!');
    }

}
