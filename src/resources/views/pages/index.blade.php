@extends('moderyat::layout.app')

@section('content')
    <div>
        <header class="d-flex align-items-center justify-content-between">
            <h1>Pages</h1>
            <a href="{{ route('pages.create') }}" class="btn btn-primary">Create new page</a>
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
                @foreach ($pages as $page)
                    <tr>
                        <td>{{ $page['id'] }}</td>
                        <td>
                            <a href="{{ route('pages.edit', $page['id']) }}">
                                {{ $page['title'] }}
                            </a>
                        </td>
                        <td>{{ $page['status'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
