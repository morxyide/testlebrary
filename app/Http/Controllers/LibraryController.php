<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\CD;
use App\Models\Magazine;
use App\Models\Video;

class LibraryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookCount = Book::count();
        $cdCount = CD::count();
        $magazineCount = Magazine::count();
        $videoCount = Video::count();
        $bookViewButton = '<a href="/books" class="w-full bg-blue-200 hover:bg-blue-400 text-black font-bold py-2 px-4 rounded-lg">View</a>';
        $cdViewButton = '<a href="/cds" class="w-full bg-blue-200 hover:bg-blue-400 text-black font-bold py-2 px-4 rounded-lg">View</a>';
        $magazineViewButton = '<a href="/magazines" class="w-full bg-blue-200 hover:bg-blue-400 text-black font-bold py-2 px-4 rounded-lg">View</a>';
        $videoViewButton = '<a href="/videos" class="w-full bg-blue-200 hover:bg-blue-400 text-black font-bold py-2 px-4 rounded-lg">View</a>';

        $headers = [
            'Type',
            'Count',
            'Action',
        ];
        $rows = [
            [
                'Book',
                $bookCount,
                $bookViewButton,
            ],
            [
                'CD',
                $cdCount,
                $cdViewButton,
            ],
            [
                'Magazine',
                $magazineCount,
                $magazineViewButton,
            ],
            [
                'Video',
                $videoCount,
                $videoViewButton,
            ],
        ];

        // $headers = ['Header 1', 'Header 2', 'Header 3'];
        // $rows = [
        //     ['Row 1 Cell 1', 'Row 1 Cell 2', 'Row 1 Cell 3'],
        //     ['Row 2 Cell 1', 'Row 2 Cell 2', 'Row 2 Cell 3'],
        //     // Add more rows as needed
        // ];
        return view('manage.library', compact('headers', 'rows'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
