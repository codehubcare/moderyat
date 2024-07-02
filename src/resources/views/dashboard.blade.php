@extends('moderyat::layout.app')

@section('content')
    <div>
        <h1>Dashboard</h1>
        <p class="lead">Hi {{ $user->name }},</p>

    </div>
@endsection
