<div class="mb-3">
    <label for="title">Title</label>
    <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $file->title) }}"
        required>
    @error('title')
        <p class="form-text text-danger">{{ $message }}</p>
    @enderror
</div>

<div class="mb-3">
    <label for="file">File</label>
    <input type="file" name="file" id="file" class="form-control">
    @error('file')
        <p class="form-text text-danger">{{ $message }}</p>
    @enderror
</div>


@if ($file->hasFileof('file'))
    <div class="mb-3">
        <a href="{{ $file->getFileUrlOf('file') }}" target="_blank">View file</a>
    </div>
@endif
