@props([
    'label',
    'name',
    'value' => null,
    'required' => false,
    'help' => null,
])

<div>
    <label for="{{ $name }}" class="mc-label {{ $required ? 'mc-required' : '' }}">{{ $label }}</label>
    <textarea id="{{ $name }}" name="{{ $name }}" @required($required) {{ $attributes->merge(['class' => 'mc-input mt-2']) }}>{{ old($name, $value) }}</textarea>
    @if ($help)
        <p class="mc-help">{{ $help }}</p>
    @endif
    @error($name)
        <p class="mc-error">{{ $message }}</p>
    @enderror
</div>
