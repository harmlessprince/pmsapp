@props(['value'])

<label {{ $attributes->merge(['class' => 'font-big text-normal text-natural']) }} >
    {{ $value ?? $slot }}
</label>
