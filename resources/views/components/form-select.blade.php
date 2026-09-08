@props([
    'label',
    'name',
    'options' => [],
    'value' => null,
    'required' => false,
    'help' => null,
])

<div>
    <label for="{{ $name }}" class="mc-label {{ $required ? 'mc-required' : '' }}">{{ $label }}</label>
    <select id="{{ $name }}" name="{{ $name }}" @required($required) {{ $attributes->merge(['class' => 'mc-input mt-2']) }}>
        {{ $slot }}
        @foreach ($options as $optionValue => $optionLabel)
            <option value="{{ $optionValue }}" @selected((string) old($name, $value) === (string) $optionValue)>{{ $optionLabel }}</option>
        @endforeach
    </select>
    @if ($help)
        <p class="mc-help">{{ $help }}</p>
    @endif
    @error($name)
        <p class="mc-error">{{ $message }}</p>
    @enderror
</div>
