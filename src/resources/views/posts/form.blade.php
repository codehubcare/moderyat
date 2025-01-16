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
    <textarea name="content" id="content" class="form-control text-editor">{{ old('content', $post->content) }}</textarea>
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



@if ($post->category->has_picture ?? true)
    <div class="mb-3">
        <label for="image">Image</label>
        <input type="file" name="image" id="image" class="form-control">
        @error('image')
            <p class="form-text text-danger">{{ $message }}</p>
        @enderror
    </div>

    @if ($post->hasFileOf('image'))
        <div class="my-3">
            <img src="{{ $post->getFileUrlOf('image') }}" width="64px" alt="{{ $post->title }}">
        </div>
    @endif
@endif

@if ($post->category->has_file ?? true)
    <div class="mb-3">
        <label for="file">File</label>
        <input type="file" name="file" id="file" class="form-control">
        @error('file')
            <p class="form-text text-danger">{{ $message }}</p>
        @enderror
    </div>

    @if ($post->hasFileOf('file'))
        <div class="my-3">
            <a href="{{ $post->getFileUrlOf('file') }}" target="_blank">{{ $post->title }}</a>
        </div>
    @endif
@endif



<fieldset>
    <legend>SEO</legend>

    <div class="mb-3">
        <label for="meta_title">Meta Title</label>
        <input type="text" name="meta_title" id="meta_title" class="form-control"
            value="{{ old('meta_title', $post->meta_title) }}">
        @error('meta_title')
            <p class="form-text text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-3">
        <label for="meta_description">Meta Description</label>
        <textarea name="meta_description" id="meta_description" class="form-control">{{ old('meta_description', $post->meta_description) }}</textarea>
        @error('meta_description')
            <p class="form-text text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-3">
        <label for="meta_keywords">Meta Keywords</label>
        <textarea name="meta_keywords" id="meta_keywords" class="form-control" placeholder="Comma separated">{{ old('meta_keywords', $post->meta_keywords) }}</textarea>
        <p class="form-text">No more than 10 keywords.</p>
        @error('meta_keywords')
            <p class="form-text text-danger">{{ $message }}</p>
        @enderror
    </div>
</fieldset>
