<div class="mb-3">
    <label for="title">Title</label>
    <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $page->title) }}"
        required>
    @error('title')
        <p class="form-text text-danger">{{ $message }}</p>
    @enderror
</div>

@if ($page->exists)
    <div class="mb-3">
        <label for="slug">slug</label>
        <input type="text" class="form-control" value="{{ old('slug', $page->slug) }}" readonly disabled>
    </div>

    <div class="mb-3">
        <label for="is_published">Status</label>
        <select name="is_published" id="is_published" class="form-select">
            <option value="1" @selected($page->isPublished())>Published</option>
            <option value="0" @selected(!$page->isPublished())>Unpublished</option>
        </select>
    </div>
@endif

<div class="mb-3">
    <label for="content">Content</label>
    <textarea name="content" id="content" class="form-control text-editor" required>{{ old('content', $page->content) }}</textarea>
    @error('content')
        <p class="form-text text-danger">{{ $message }}</p>
    @enderror
</div>
