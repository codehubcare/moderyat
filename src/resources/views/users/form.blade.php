<div class="mb-3">
    <label for="name">Name</label>
    <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $user->name) }}" required>
    @error('name')
        <p class="form-text text-danger">{{ $message }}</p>
    @enderror
</div>


<div class="mb-3">
    <label for="email">Email</label>
    <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}"
        required>
    @error('email')
        <p class="form-text text-danger">{{ $message }}</p>
    @enderror
</div>


<div class="mb-3">
    <label for="created_at">Created</label>
    <input type="text" class="form-control" value="{{ old('created_at', $user->created_at) }}" readonly disabled>
</div>

<div class="mb-3">
    <label for="updated_at">Updated</label>
    <input type="text" class="form-control" value="{{ old('updated_at', $user->updated_at) }}" readonly disabled>
</div>
