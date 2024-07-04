@extends('moderyat::layout.app')

@section('content')
    <form action="{{ route('posts.store') }}" method="post">
        @csrf
        <header class="d-flex align-items-center justify-content-between">
            <h1>Add new post</h1>
        </header>

        @include('moderyat::posts.form')
        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('posts.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection
