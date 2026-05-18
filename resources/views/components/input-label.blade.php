@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-bold text-sm text-gray-500 dark:text-gray-500']) }}>
    {{ $value ?? $slot }}
</label>
