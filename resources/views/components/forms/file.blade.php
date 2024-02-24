@props([
    'name',
    'accept' => 'image'
])
<br>
<div class="form-group">
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text">Upload</span>
        </div>
        <div class="custom-file">
            <label class="custom-file-label">Choose {{$name}}</label>

            <x-forms.input type="file" name="{{$name}}" class="custom-file-input" accept="image/*" />
        </div>
    </div>
    @error($name)
        <div class="invalid-feedback">
            <p>{{ $message }}</p>
        </div>
    @enderror
</div>
