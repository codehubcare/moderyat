@extends('moderyat::layout.app')

@section('content')
    <section>
        <h1>Update file</h1>
        <form action="{{ route('files.update', $file) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('moderyat::files.form')

            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{ route('files.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </section>

    <section class="mt-5">
        <div class="alert alert-danger">
            <form action="{{ route('files.destroy', $file) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete File</button>
            </form>
        </div>
    </section>
@endsection
