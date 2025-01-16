@extends('moderyat::layout.app')

@section('content')
    <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <header class="mb-3 d-flex align-items-center justify-content-between">
            <h1>Add new post</h1>
        </header>

        @include('moderyat::posts.form')

        <div class="mt-3">
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{ route('posts.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
@endsection
