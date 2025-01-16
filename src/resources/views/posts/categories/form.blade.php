<div class="mb-3">
    <label for="title">Title</label>
    <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $postCategory->title) }}"
        required>
    @error('title')
        <p class="form-text text-danger">{{ $message }}</p>
    @enderror
</div>

<div class="mb-3">
    <label for="content">Content</label>
    <textarea name="content" id="content" class="form-control text-editor">
        {{ old('content', $postCategory->content) }}
    </textarea>
    @error('content')
        <p class="form-text text-danger">{{ $message }}</p>
    @enderror
</div>

<div class="row">
    <div class="mb-3 col">
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
    
    
    <div class="mb-3 col">
        <label for="is_published">Publish Status</label>
        <select name="is_published" id="is_published" class="form-control">
            <option value="0" @selected(old('is_published', $postCategory->is_published) == 0)>Unpublished</option>
            <option value="1" @selected(old('is_published', $postCategory->is_published) == 1)>Published</option>
        </select>
        @error('is_published')
            <p class="form-text text-danger">{{ $message }}</p>
        @enderror
    </div>
</div>


<div class="row">
    <div class="mb-3 col">
        <label for="has_picture">Has Picture</label>
        <select name="has_picture" id="has_picture" class="form-control">
            <option value="0" @selected(old('has_picture', $postCategory->has_picture) == 0)>No</option>
            <option value="1" @selected(old('has_picture', $postCategory->has_picture) == 1)>Yes</option>
        </select>
        @error('has_picture')
            <p class="form-text text-danger">{{ $message }}</p>
        @enderror
    </div>
    
    <div class="mb-3 col">
        <label for="has_file">Has File</label>
        <select name="has_file" id="has_file" class="form-control">
            <option value="0" @selected(old('has_file', $postCategory->has_file) == 0)>No</option>
            <option value="1" @selected(old('has_file', $postCategory->has_file) == 1)>Yes</option>
        </select>
        @error('has_file')
            <p class="form-text text-danger">{{ $message }}</p>
        @enderror
    </div>
</div>

<div class="mb-3">
    <label for="image">Image</label>
    <input type="file" name="image" id="image" class="form-control">
    @error('image')
        <p class="form-text text-danger">{{ $message }}</p>
    @enderror
</div>

@if ($postCategory->hasFileOf('image'))
    <div class="my-3">
        <img src="{{ $postCategory->getFileUrlOf('image') }}" width="64px" alt="{{ $postCategory->title }}">
    </div>
@endif
