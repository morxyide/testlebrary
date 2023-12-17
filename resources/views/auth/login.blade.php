@extends('auth.layouts')
@section('content')
    <main class="mx-4">
            <h3 class="text-center text-sl font-semibold mb-4">Login</h3>

            <form method="POST" action="{{ route('custom.login') }}">
                @csrf

                <!-- Email field -->
                <div class="mb-4">
                    <label for="email">
                        <input type="text" placeholder="Email" id="email" class="w-full p-2 border rounded" name="email" required autofocus>
                    </label>
                    @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>

                <!-- Password field -->
                <div class="mb-4">
                    <label for="password">
                        <input type="password" placeholder="Password" id="password" class="w-full p-2 border rounded" name="password" required>
                    </label>
                    @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                </div>

                <!-- Checkbox -->
                <div class="mb-4">
                    <label for="remember" class="flex items-center">
                        <input type="checkbox" name="remember" class="mr-2"> Remember Me
                    </label>
                </div>

                <!-- Submit button -->
                <button type="submit" class="bg-gray-800 text-white py-2 px-4 rounded-full w-full">>> Log in</button>
            </form>
    </main>
@endsection
