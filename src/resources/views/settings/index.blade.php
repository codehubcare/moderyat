@extends('moderyat::layout.app')

@section('content')
    <div>
        <header class="mb-3 d-flex align-items-center justify-content-between">
            <h1>Settings</h1>

            <div class="gap-3 d-flex">
                <a href="{{ route('settings.create') }}" class="btn btn-secondary">
                    <i class="fas fa-plus"></i>
                    Add new key
                </a>

                <section>
                    <form action="{{ route('settings.process') }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-sync"></i>
                            Process Settings
                        </button>
                    </form>
                </section>
            </div>
        </header>

        <main>

            @if ($settings->isEmpty())
                <div class="alert alert-info">
                    No settings found.
                </div>
            @else
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
            @endif
        </main>


    </div>
@endsection
