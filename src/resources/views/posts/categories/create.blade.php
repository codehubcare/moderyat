@extends('moderyat::layout.app')

@section('content')
    <div>
        <form action="{{ route('post-categories.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <header class="d-flex align-items-center justify-content-between">
                <h1>Add new post category</h1>
            </header>

            @include('moderyat::posts.categories.form')

            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('post-categories.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
@endsection
