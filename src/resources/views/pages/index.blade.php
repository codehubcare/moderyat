@extends('moderyat::layout.app')

@section('content')
    <div>
        <h1>Pages</h1>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Action</th>
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
                        <td></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
