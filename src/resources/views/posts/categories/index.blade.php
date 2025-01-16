@extends('moderyat::layout.app')

@section('content')
    <div>
        <header class="mb-3 d-flex align-items-center justify-content-between">
            <h1>Post Categories</h1>
            <a href="{{ route('post-categories.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i>
                Add new category
            </a>
        </header>

        @if ($postCategories->count() <= 0)
            <p class="alert-info text-muted alert">No categories</p>
        @else
            <table class="table border">
                <thead>
                    <tr>
                        <th width="50">ID</th>
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
        @endif
    </div>
@endsection
