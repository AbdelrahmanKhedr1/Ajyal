<x-forms.errors />

    <x-forms.input label="Name" type="text" name="name" :value="$category->name" placeholder="Enter Name" />
    <x-forms.select :options="$parents" label="Category" name="parent_id" :selected="$category->parent_id" />
    <x-forms.textarea label="Description" name="description" :value="$category->description" rows="3" />
<br>

<div class="form-group">
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text">Upload</span>
        </div>
        <div class="custom-file">
            <label class="custom-file-label">Choose image</label>

            <x-forms.input type="file" name="image" class="custom-file-input" accept="image/*" />
        </div>
    </div>
    @error('image')
        <div class="invalid-feedback">
            <p>{{ $message }}</p>
        </div>
    @enderror
</div>

<x-forms.radio name="status" :checked="$category->status" :options="['active'=>'Active','archived'=>'Archived']" />
<br>
<button type="submit" class="btn btn-primary">{{ $button_lable ?? 'Save' }} </button>
