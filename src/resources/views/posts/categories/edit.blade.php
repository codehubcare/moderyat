@extends('moderyat::layout.app')

@section('content')
    <div>
        <form action="{{ route('post-categories.update', $postCategory) }}" method="post">
            @csrf
            @method('PUT')

            <header class="d-flex align-items-center justify-content-between">
                <h1>Update post category</h1>
            </header>

            @include('moderyat::posts.categories.form')

            <button type="submit" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-secondary" onclick="window.history.back()">Go Back</button>
        </form>
    </div>

    {{-- Sub Categories --}}
    @if ($postCategory->hasSubCategories())
        <div class="mt-5">
            <h2>Sub Categories</h2>

            <table class="table">
                <thead>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Status</th>
                </thead>
                <tbody>
                    @foreach ($postCategory->subCategories as $subCategory)
                        <tr>
                            <td>{{ $subCategory['id'] }}</td>
                            <td>
                                <a href="{{ route('post-categories.edit', $subCategory['id']) }}">
                                    {{ $subCategory['title'] }}
                                </a>
                            </td>
                            <td>{{ $subCategory['status'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

    {{-- Delete --}}
    <div class="mt-5">
        <div class="alert alert-danger">
            <form action="{{ route('post-categories.destroy', $postCategory) }}" method="post">
                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete
                    category</button>
        </div>
    </div>
@endsection
