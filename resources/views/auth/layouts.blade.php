<!DOCTYPE html>

<html lang="en">
<head>
    <title>Authentication</title>
    @vite('resources/css/app.css')
</head>

<body>
    <nav class="flex items-center justify-between bg-blue-200 p-4 mb-0">
        <a class="text-xl font-bold text-black-900" href="{{ route('user.dashboard') }}">
            Library Management System 
            @if (Auth::check() && Auth::user()->role == 'admin')
                <span class="text-xs">(admin)</span>
            @elseif (Auth::check() && Auth::user()->role == 'user')
                <span class="text-xs">(user)</span>
            @endif
        </a>

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
            <div id="alert" class="fixed inset-x-0 top-0 flex justify-center pt-6 z-50">
                <div class="w-64 p-4 bg-green-500 text-white rounded shadow">
                    {{ session()->get('success') }}
                </div>
            </div>

            <script>
                setTimeout(function() {
                    const alert = document.getElementById('alert');
                    if (alert) {
                        alert.style.display = 'none';
                    }
                }, 1000); // 3000 milliseconds = 3 seconds
            </script>
        @endif
    </nav>
    @yield('content')

</body>

</html>
