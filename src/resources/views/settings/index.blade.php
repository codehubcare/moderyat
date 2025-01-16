@extends('moderyat::layout.app')

@section('content')
    <div>
        <header class="d-flex align-items-center justify-content-between">
            <h1>Settings</h1>

            <a href="{{ route('settings.create') }}" class="btn btn-primary">
                Add new key
            </a>
        </header>

        <section class="my-3">
            <form action="{{ route('settings.process') }}" method="post">
                @csrf
                <button type="submit" class="btn btn-primary">Process Settings</button>
            </form>
        </section>

        <main>

            <table class="table border">
                <thead>
                    <tr>
                        <th>Key</th>
                        <th>value</th>
                        <th>Type</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($settings as $setting)
                        <tr>
                            <td>
                                <a href="{{ route('settings.edit', $setting['id']) }}">{{ $setting['key'] }}</a>
                            </td>
                            <td>{{ $setting['value'] }}</td>
                            <td>{{ $setting['type'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </main>


    </div>
@endsection
