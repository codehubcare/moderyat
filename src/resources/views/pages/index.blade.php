@extends('moderyat::layout.app')

@section('content')
    <div>
        <header class="mb-3 d-flex align-items-center justify-content-between">
            <h1>Pages</h1>
            <a href="{{ route('pages.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i>
                Create new page
            </a>
        </header>

        <table class="table border">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pages as $page)
                    <tr>
                        <td>{{ $page['id'] }}</td>
                        <td>
                            <a href="{{ route('pages.edit', $page['id']) }}">
                                <span class="text-dark">
                                    {{ $page['title'] }}
                                </span>
                                <small class="d-block text-muted">
                                    {{ $page['slug'] }}
                                </small>
                            </a>
                        </td>
                        <td>
                            @if ($page->isPublished())
                                <i class="fas fa-check text-success"></i>
                               <span class="text-sm text-success"> {{ $page['status'] }}</span>
                            @else
                                <i class="fas fa-times text-danger"></i>
                                <span class="text-sm text-danger">
                                    {{ $page['status'] }}
                                </span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-3"> 
            {{ $pages->links() }}
        </div>
    </div>
@endsection
