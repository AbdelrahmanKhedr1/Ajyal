{{-- <x-forms.input label="Name" type="text" name="name" :value="$category->name" placeholder="Enter Name" /> --}}

@props([
    'type' =>'text',
    'label'=>null,
    'name',
    'value' =>null,

])
<div class="form-group">
<label>{{$label}}</label>

<input
    type="{{$type}}"
    name="{{$name}}"
    value="{{ old($name, $value) }}"

    {{ $attributes->class([
        'form-control',
        'is-invalid' => $errors->has($name)
    ]) }}
/>

@error($name)
    <div class="invalid-feedback">
        <p>{{ $message }}</p>
    </div>
@enderror
</div>
