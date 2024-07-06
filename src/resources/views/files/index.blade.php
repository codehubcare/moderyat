@extends('moderyat::layout.app')

@section('content')
    <div>
        <header class="d-flex align-items-center justify-content-between">
            <h1>Files</h1>
            <a href="{{ route('files.create') }}" class="btn btn-primary">Upload File</a>
        </header>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>File Url</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($files as $file)
                    <tr>
                        <td>{{ $file['id'] }}</td>
                        <td>
                            <a href="{{ route('files.edit', $file['id']) }}">
                                {{ $file['title'] }}
                            </a>
                        </td>
                        <td>
                            {{ $file->getFileUrlof('file') }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
