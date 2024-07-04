@extends('moderyat::layout.app')

@section('content')
    <section>
        <header class="d-flex align-items-center justify-content-between">
            <h1>Update User</h1>
        </header>

        <form action="{{ route('users.update', $user) }}" method="post">
            @csrf
            @method('PUT')

            @include('moderyat::users.form')

            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancel</a>
        </form>

    </section>

    <section class="mt-5">
        <div class="alert alert-danger">
            <form action="{{ route('users.destroy', $user) }}" method="post">
                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete User</button>
            </form>
        </div>
    </section>
@endsection
