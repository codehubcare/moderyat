@extends('moderyat::layout.app')

@section('content')
    <div>
        <header class="d-flex align-items-center justify-content-between">
            <h1>Settings</h1>

            <a href="{{ route('settings.create') }}" class="btn btn-primary">
                Add new key
            </a>
        </header>

        <main>

            <table class="table">
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
                            <td>{{ $setting['key'] }}</td>
                            <td>{{ $setting['value'] }}</td>
                            <td>{{ $setting['type'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </main>


    </div>
@endsection
