@props([
    'name' ,
    'options',
    'checked' => null ,
])

@foreach ($options as $value => $text )
<div class="custom-control custom-radio">

    <input type="radio"
    id='customRadio{{$value}}'
    name="{{ $name }}"
    value="{{ $value }}"
    class="custom-control-input"
    @checked(old($name, $checked) === $value)
    {{$attributes}}
    >
    <label class="custom-control-label"
    for='customRadio{{$value}}'
    >{{ $text }}</label>
</div>

@endforeach
@error($name)
    <div class="text-danger">
        <p>{{ $message }}</p>
    </div>
@enderror
