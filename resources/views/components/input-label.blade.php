@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm dark:text-gray-300']) }} style="color:black">
    {{ $value ?? $slot }}
</label>
