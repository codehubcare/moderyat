@extends('moderyat::layout.app')

@section('content')
    <div >
        <form action="{{ route('pages.store') }}" method="post">
            @csrf
            <header class="d-flex align-items-center justify-content-between">
                <h1>Add new page</h1>
            </header>

            @include('moderyat::pages.form')

            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection
