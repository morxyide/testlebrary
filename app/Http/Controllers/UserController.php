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

        $headers = ['ID', 'Name', 'Email', 'Role', '# of Borrowed items', 'Action'];

        $rows = $users->map(function ($user) {
            $deleteRoute = route('users.destroy', $user);
            $viewRoute = route('manage.borrowed', $user);

            $buttons = <<<HTML
            <div class="button-container">
                <form action="{$deleteRoute}" method="post" class="mb-3">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-200 hover:bg-red-400 text-black font-bold py-2 px-4 rounded-lg mb-4">
                        Delete User
                    </button>
                </form>
                <a href="{$viewRoute}" class="bg-green-200 hover:bg-green-400 text-black font-bold py-2 px-4 rounded-lg mb-4">View Borrowings</a>
            </div>
            HTML;
            
            $buttons = str_replace(
                ['{$deleteRoute}', '{$viewRoute}', '@csrf', '@method(\'DELETE\')'], 
                [route('users.destroy', $user), route('manage.borrowed', $user), csrf_field(), method_field('DELETE')], 
                $buttons
            );
            
            $borrowedItemsCounter = $user->borrowings->count();
            
            return [
                $user->id,
                $user->name,
                $user->email,
                $user->role,
                $borrowedItemsCounter,
                $buttons,
                // $deleteButton.$viewBorrowingsButton,
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
        return redirect()->back()->with('success', 'Item marked as returned successfully!');
    }

    # For admins to view the borrowings of a user
    public function manageBorrowings(User $user)
    {
        $borrowings = $user->borrowings;

        return view('manage.borrowings', compact('borrowings'));
    }
}
