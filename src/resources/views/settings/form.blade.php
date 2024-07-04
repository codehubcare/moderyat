<div class="mb-3">
    <label for="key">Key</label>
    <input type="text" name="key" id="key" class="form-control" value="{{ old('key') }}" required>
    @error('key')
        <p class="form-text text-danger">{{ $message }}</p>
    @enderror
</div>


<div class="mb-3">
    <label for="value">value</label>
    <input type="text" name="value" id="value" class="form-control" value="{{ old('value') }}" required>
    @error('value')
        <p class="form-text text-danger">{{ $message }}</p>
    @enderror
</div>

<div class="mb-3">
    <label for="type">Type</label>
    <select name="type" id="type" class="form-control">
        <option value="string">String</option>
        <option value="number">Number</option>
        <option value="boolean">Boolean</option>
        <option value="array">Array</option>
        <option value="json">JSON</option>
        <option value="file">File</option>
    </select>
    @error('type')
        <p class="form-text text-danger">{{ $message }}</p>
    @enderror
</div>
