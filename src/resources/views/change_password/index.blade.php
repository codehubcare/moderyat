@extends('moderyat::layout.app')

@section('content')
    <div>
        <header class="d-flex align-items-center justify-content-between">
            <h1>Change Password</h1>
        </header>

        <form action="{{ route('change-password.update') }}" method="post">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name">Name</label>
                <input type="text" class="form-control" value="{{ old('name', $user->name) }}" readonly disabled>
            </div>

            <div class="mb-3">
                <label for="current_password">Current Password</label>
                <input type="password" name="current_password" id="current_password" class="form-control"
                    value="{{ old('current_password') }}" required>
                @error('current_password')
                    <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="new_password">New Password</label>
                <input type="password" name="new_password" id="new_password" class="form-control" required>
                @error('new_password')
                    <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="new_password_confirmation">Confirm New Password</label>
                <input type="password" name="new_password_confirmation" id="new_password_confirmation" class="form-control"
                    required>
                @error('new_password_confirmation')
                    <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>


            <div>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>

        </form>
    </div>
@endsection
