@extends('moderyat::layout.app')

@section('content')
    <div>
        <header class="d-flex align-items-center justify-content-between">
            <h1>Post Categories</h1>
            <a href="{{ route('post-categories.create') }}" class="btn btn-primary">Add new category</a>
        </header>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($postCategories as $category)
                    <tr>
                        <td>{{ $category['id'] }}</td>
                        <td>
                            <a href="{{ route('post-categories.edit', $category['id']) }}">
                                {{ $category['title'] }}
                            </a>
                        </td>
                        <td>{{ $category['status'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div>
            {{ $postCategories->links() }}
        </div>
    </div>
@endsection
