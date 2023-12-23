@extends('../auth.layouts')

@section('content')

    <h1>
        Hello, {{ Auth::user()->name }}!
    </h1>

    <p>
        You are logged in as a {{ Auth::user()->role }}.
    </p>

@endsection