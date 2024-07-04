@extends('moderyat::layout.app')

@section('content')
    <section>
        <header class="d-flex align-items-center justify-content-between">
            <h1>Update setting key</h1>
        </header>

        <form action="{{ route('settings.update', $setting) }}" method="post">
            @csrf
            @method('PUT')
            @include('moderyat::settings.form')

            <button type="submit" class="btn btn-primary">Save</button>
        </form>

    </section>


    <section class="mt-5">
        <div class="alert alert-danger">
            <form action="{{ route('settings.destroy', $setting) }}" method="post">
                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">
                    Delete Setting
                </button>
            </form>
        </div>
    </section>
@endsection
