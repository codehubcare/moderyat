@extends('moderyat::layout.app')

@section('content')
    <div>
        <header class="mb-3 d-flex align-items-center justify-content-between">
            <h1>Posts</h1>
            <a href="{{ route('posts.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i>
                Add new post
            </a>
        </header>

        <main>
            @if ($posts->isEmpty())
                <div class="mt-3 alert alert-info">
                    No posts found.
                </div>
            @else
                <table class="table border">
                    <thead>
                        <tr>
                            <th width="50">ID</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{ $post['id'] }}</td>
                                <td>
                                    <a href="{{ route('posts.edit', $post['id']) }}">
                                        {{ $post['title'] }}
                                    </a>
                                </td>
                                <td>{{ $post->category->title }}</td>
                                <td>{{ $post['status'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div>
                    {{ $posts->links() }}
                </div>
            @endif
        </main>
    </div>
@endsection
