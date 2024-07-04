<div class="mb-3">
    <label for="title">Title</label>
    <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $post->title) }}"
        required>
    @error('title')
        <p class="form-text text-danger">{{ $message }}</p>
    @enderror
</div>

<div class="mb-3">
    <label for="category_id">Category</label>
    <select name="category_id" id="category_id" class="form-control" required>
        <option value="">Select category</option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}" @selected(old('category_id', $post->category_id) == $category->id)>
                {{ $category->title }}
            </option>
        @endforeach
    </select>
    @error('category_id')
        <p class="form-text text-danger">{{ $message }}</p>
    @enderror
</div>

<div class="mb-3">
    <label for="content">Content</label>
    <textarea name="content" id="content" class="form-control" required>{{ old('content', $post->content) }}</textarea>
    @error('content')
        <p class="form-text text-danger">{{ $message }}</p>
    @enderror
</div>

<div class="mb-3">
    <label for="is_published">Publish Status</label>
    <select name="is_published" id="is_published" class="form-control" required>
        <option value="0" @selected(old('is_published', $post->is_published) == 0)>Unpublished</option>
        <option value="1" @selected(old('is_published', $post->is_published) == 1)>Published</option>
    </select>
    @error('is_published')
        <p class="form-text text-danger">{{ $message }}</p>
    @enderror
</div>
