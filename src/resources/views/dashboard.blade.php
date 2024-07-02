@extends('moderyat::layout.app')

@section('content')
    <div>
        <h1>Dashboard</h1>
        <p class="lead">Hi {{ $user->name }},</p>

        <form action="{{ route('logout') }}" method="post">
            @csrf
            <button type="submit" class="btn btn-link">Logout</button>
        </form>
    </div>
@endsection
