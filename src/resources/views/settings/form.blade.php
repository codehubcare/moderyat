<div class="mb-3">
    <label for="key">Key</label>
    <input type="text" name="key" id="key" class="form-control" value="{{ old('key', $setting->key) }}"
        required>
    @error('key')
        <p class="form-text text-danger">{{ $message }}</p>
    @enderror
</div>


<div class="mb-3">
    <label for="value">Value</label>
    <input type="text" name="value" id="value" class="form-control" value="{{ old('value', $setting->value) }}"
        required>
    @error('value')
        <p class="form-text text-danger">{{ $message }}</p>
    @enderror
</div>

<div class="mb-3">
    <label for="type">Type</label>
    <select name="type" id="type" class="form-control">
        @foreach ($setting->getTypes() as $type)
            <option value="{{ $type }}" @selected(old('type', $setting->type) == $type)>{{ $type }}</option>
        @endforeach
    </select>
    @error('type')
        <p class="form-text text-danger">{{ $message }}</p>
    @enderror
</div>
