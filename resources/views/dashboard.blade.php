@extends('components.header')

@section('content')
    <nav class="bg-blue-200 p-4 text-black mb-2">
        <ul class="flex space-x-4">
            <h1 class="font-bold mb-0">Home page</h1>
        </ul>
    </nav>

    <div class="py-6 flex flex-col justify-center sm:py-12">
        <div class="relative py-3 sm:max-w-xl sm:mx-auto">
            <div class="relative px-4 py-10 bg-blue-100 mx-8 md:mx-0 shadow rounded-lg sm:p-10">
                <div class="max-w-md mx-auto">
                    <div class="flex items-center space-x-5">
                        <div class="block pl-2 font-bold text-xl self-start text-gray-700">
                            <h2 class="leading-relaxed">Hello, {{ Auth::user()->name }}!</h2>
                            <p class="text-sm text-gray-500 font-semibold leading-relaxed">You are logged in as a {{ Auth::user()->role }}.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="relative py-3 sm:max-w-xl sm:mx-auto">
            <div class="relative px-4 py-10 bg-blue-100 mx-8 md:mx-0 shadow rounded-lg sm:p-10">
                <div class="max-w-md mx-auto">
                    <div class="flex items-center space-x-5">
                        <div class="block pl-2 font-bold text-xl self-start text-gray-700">
                            <p class="text-sm text-gray-500 font-semibold leading-relaxed"> You borrowed {{ Auth::user()->borrowings->count()}} items.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="relative py-3 sm:max-w-xl sm:mx-auto">
            <div class="relative px-4 py-10 bg-blue-100 mx-8 md:mx-0 shadow rounded-lg sm:p-10">
                <div class="max-w-md mx-auto">
                    <div class="flex items-center space-x-5">
                        <div class="block pl-2 font-bold text-xl self-start text-gray-700">
                            <p class="text-sm text-gray-500 font-semibold leading-relaxed"> You have xx due returns.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection