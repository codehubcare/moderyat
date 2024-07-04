<div class="mb-3">
    <label for="title">Title</label>
    <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $page->title) }}"
        required>
    @error('title')
        <p class="form-text text-danger">{{ $message }}</p>
    @enderror
</div>

<div class="mb-3">
    <label for="slug">slug</label>
    <input type="text" name="slug" id="slug" class="form-control" value="{{ old('slug', $page->slug) }}"
        required>
    @error('slug')
        <p class="form-text text-danger">{{ $message }}</p>
    @enderror
</div>

<div class="mb-3">
    <label for="content">Content</label>
    <textarea name="content" id="content" class="form-control" required>{{ old('content', $page->content) }}</textarea>
    @error('content')
        <p class="form-text text-danger">{{ $message }}</p>
    @enderror
</div>
