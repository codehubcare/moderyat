<div class="mb-3">
    <label for="title">Title</label>
    <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $postCategory->title) }}"
        required>
    @error('title')
        <p class="form-text text-danger">{{ $message }}</p>
    @enderror
</div>

<div class="mb-3">
    <label for="parent_id">Parent</label>
    <select name="parent_id" id="parent_id" class="form-control">
        <option value="0">None</option>
        @foreach ($mainCategories as $category)
            <option value="{{ $category->id }}" @selected(old('parent_id', $postCategory->parent_id) == $category->id)>
                {{ $category->title }}
            </option>
        @endforeach
    </select>
    @error('parent_id')
        <p class="form-text text-danger">{{ $message }}</p>
    @enderror
</div>


<div class="mb-3">
    <label for="is_published">Publish Status</label>
    <select name="is_published" id="is_published" class="form-control">
        <option value="0" @selected(old('is_published', $postCategory->is_published) == 0)>Unpublished</option>
        <option value="1" @selected(old('is_published', $postCategory->is_published) == 1)>Published</option>
    </select>
    @error('is_published')
        <p class="form-text text-danger">{{ $message }}</p>
    @enderror
</div>
