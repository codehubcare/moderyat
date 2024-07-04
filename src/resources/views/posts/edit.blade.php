@extends('moderyat::layout.app')

@section('content')
    <section>
        <form action="{{ route('posts.update', $post) }}" method="post">
            @csrf
            @method('PUT')

            <header class="d-flex align-items-center justify-content-between">
                <h1>Update post</h1>
            </header>

            @include('moderyat::posts.form')
            <button type="submit" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-secondary" onclick="window.history.back()">Go back</button>
        </form>
    </section>

    <section class="mt-5">
        <div class="alert alert-danger">
            <form action="{{ route('posts.destroy', $post) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete Post</button>
            </form>
        </div>
    </section>
@endsection
