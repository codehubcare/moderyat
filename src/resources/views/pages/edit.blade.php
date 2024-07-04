@extends('moderyat::layout.app')

@section('content')
    <div>
        <form action="{{ route('pages.update', $page) }}" method="post">
            @csrf
            @method('PUT')

            <header class="d-flex align-items-center justify-content-between">
                <h1>Update page</h1>
            </header>

            @include('moderyat::pages.form')

            <div>
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('pages.index') }}" class="btn btn-secondary">Cancel</a>
            </div>

        </form>
    </div>
@endsection