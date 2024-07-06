@extends('moderyat::layout.app')

@section('content')
    <section>
        <h1>Upload new file</h1>
        <form action="{{ route('files.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            @include('moderyat::files.form')
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{ route('files.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </section>
@endsection
