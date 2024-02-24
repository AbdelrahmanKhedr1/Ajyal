{{-- <x-forms.textarea label="Description" name="description" :value="$category->description" rows="3" /> --}}

@props([
    'label'=>null,
    'name',
    'value' => '',
])

<label>{{$label}}</label>

<textarea
    name="{{$name}}"
    class="form-control @error($name) is-invalid @enderror"
    {{$attributes}}
>
{{ old($name, $value) }}
</textarea>
@error($name)
    <div class="invalid-feedback">
        <p>{{ $message }}</p>
    </div>
@enderror
