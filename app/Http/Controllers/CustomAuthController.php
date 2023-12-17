<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Auth\AuthManager;

class CustomAuthController extends Controller
{
    public function loginPage(): \Illuminate\Contracts\View\View
    {
        return view('auth.login');
    }

    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        $credentials = $request->only('email', 'password');

        
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard')->withSuccess('Signed in');
            } else {
                return redirect()->route('user.dashboard')->withSuccess('Signed in');
            }
        } else {
            return redirect("/login")->withSuccess('Login details are not valid');
        }
    }

    public function registerPage() : \Illuminate\Contracts\View\View
    {
        return view('auth.registration');
    }

    public function customRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8'
        ]);

        $data = $request->all();
        $check = $this->create($data);

        $credentials = $request->only('email', 'password');

        // TODO: Check why this does not redirect to the dashboard
        if (Auth::attempt($credentials)) {
            return redirect()->route('user.dashboard')->withSuccess('Signed in');
        } else {
            return redirect()->route('register.page')->withSuccess('Registration failed or try to login again...');
        }
    }

    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }

    public function adminDashboardPage()
    {
        if (Auth::check()) {
            return view('adminDashboard');
        }

        return redirect()->route("login")->withSuccess('You are not allowed to access');
    }

    public function userDashboardPage()
    {
        if (Auth::check()) {
            return view('userDashboard');
        } else {
            return redirect()->route("login.page")->withSuccess('You are not allowed to access');
        }
    }

    public function signout()
    {
        Session::flush();
        Auth::logout();

        return redirect()->route("login.page")->withSuccess('Logged out successfully');
    }
}
