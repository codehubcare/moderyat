@extends('moderyat::layout.app')

@section('content')
    <div>
        <header class="d-flex align-items-center justify-content-between">
            <h1>Add new settings key</h1>
        </header>

        <form action="{{ route('settings.store') }}" method="post">
            @csrf
            @include('moderyat::settings.form')

            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{ route('settings.index') }}" class="btn btn-secondary">Cancel</a>
        </form>

    </div>
@endsection
