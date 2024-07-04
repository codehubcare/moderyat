@extends('moderyat::layout.app')

@section('content')
    <div>
        <header class="d-flex align-items-center justify-content-between">
            <h1>Update setting key</h1>
        </header>

        <form action="{{ route('settings.update', $setting) }}" method="post">
            @csrf
            @method('PUT')
            @include('moderyat::settings.form')

            <button type="submit" class="btn btn-primary">Save</button>
        </form>

    </div>
@endsection
