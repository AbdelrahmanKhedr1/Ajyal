@props([
    'label' => null,
    'options',
    'name',
    'selected' => null,
])


<div class="form-group">
    <label for="disabledInput">{{$label}} </label>
    <select class="form-control @error($name) is-invalid @enderror" name="{{$name}}">
        <option value="">Main {{$label}}</option>
        @foreach ($options as $option)
            <option value="{{ $option->id }}" @selected(old($name, $selected) === $option->id)>
                {{ $option->name }}
            </option>
        @endforeach
        {{-- @foreach($options as $value => $text)
        <option value="{{ $value }}" @selected($value == $selected)>{{ $text->name ?? $text }}</option>
        @endforeach --}}
    </select>
    @error($name)
        <div class="invalid-feedback">
            <p>{{ $message }}</p>
        </div>
    @enderror
</div>

