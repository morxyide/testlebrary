<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Borrowing;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();

        $headers = ['ID', 'Name', 'Email', 'Role', 'Action'];

        $rows = $users->map(function ($user) {
            $deleteButton = '<form action="'.route('users.destroy', $user).'" method="post">
                                '.csrf_field().'
                                '.method_field('DELETE').'
                                <button type="submit" class="bg-blue-200 hover:bg-blue-400 text-black font-bold py-2 px-4 rounded-lg">Delete</button>
                             </form>';

            return [
                $user->id,
                $user->name,
                $user->email,
                $user->role,
                $deleteButton,
            ];
        });

        return view('manage.users', compact('headers', 'rows'));
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
        $user = User::find($id);

        if ($user) {
            $user->delete();
            return redirect()->route('users.index')->with('success', 'Book deleted successfully!');
        } else {
            return redirect()->route('users.index')->with('error', 'Error deleting user!');
        }
        
    }

    public function borrowedItems()
    {
        $user = Auth::user();
        $borrowings = $user->borrowings;

        return view('manage.borrowings', compact('borrowings'));
    }

    public function return(Borrowing $borrowing)
    {
        $borrowing->delete();
        return redirect()->route('user.borrowed')->with('success', 'Item marked as returned successfully!');
    }
}
