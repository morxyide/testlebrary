<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use Illuminate\Support\Facades\Auth;

class VideoController extends Controller
{
    public function index()
    {
        $videos = Video::all();
        return view('videos.index', compact('videos'));
    }

    public function create()
    {
        return view('videos.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'director' => 'required|string|max:255',
            'producer' => 'required|string|max:255',
            'year_published' => 'required|integer',
            'category' => 'required|string',
            'description' => 'required|string',
            'quantity' => 'required|integer',
        ]);

        Video::create($data);

        return redirect()->route('videos.index')->with('success', 'Video created successfully!');
    }

    public function edit(Video $video)
    {
        return view('videos.edit', compact('video'));
    }

    public function update(Request $request, Video $video)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
        ]);
        
        $video->update($data);

        return redirect()->route('videos.index')->with('success', 'Video updated successfully!');
    }

    public function destroy(Video $video)
    {
        $video->delete();

        return redirect()->route('videos.index')->with('success', 'Video deleted successfully!');
    }

    public function borrow(Request $request, Video $video)
    {
        $user_id = Auth::user()->id;
        $borrowed_at = now();
        $days = $request->input('days');
        $return_by = $borrowed_at->addDays($days);

        $video->borrowings()->create([
            'user_id' => $user_id,
            'borrowable_type' => Video::class,
            'borrowable_id' => $video->id,
            'borrowed_at' => $borrowed_at,
            'return_by' => $return_by,
        ]);

        return redirect()->route('videos.index')->with('success', 'Video borrowed successfully!');
    }

}
