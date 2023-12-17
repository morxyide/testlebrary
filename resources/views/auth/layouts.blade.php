<!DOCTYPE html>

<html lang="en">
<head>
    <title>Authentication</title>
    @vite('resources/css/app.css')
</head>

<body>
    <nav class="flex items-center justify-between bg-blue-200 p-4 mb-5">
        <a class="text-xl font-bold text-black-900" href="{{ route('user.dashboard') }}">Library Management System</a>

        <div class="block">
            <ul class="flex space-x-4">
                @guest
                    <li>
                        <a class="text-blue-900 hover:underline" href="{{ route('login.page') }}">Login</a>
                    </li>
                    <li>
                        <a class="text-blue-900 hover:underline" href="{{ route('register.page') }}" >Registration</a>
                    </li>

                @else
                <li>
                    <a class="text-blue-900 hover:underline" href="{{ route('signout') }}">Sign out</a>
                </li>

                @endguest
            </ul>
        </div>
        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
    </nav>
    @yield('content')

</body>

</html>
