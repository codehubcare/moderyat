@extends('moderyat::layout.app')

@section('content')
    <div>
        <form action="{{ route('post-categories.store') }}" method="post">
            @csrf
            <header class="d-flex align-items-center justify-content-between">
                <h1>Add new post category</h1>
            </header>

            @include('moderyat::posts.categories.form')

            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection
