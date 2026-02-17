@props(['value'])

<label {{ $attributes->merge(['class' => 'block text-xs font-bold uppercase tracking-widest text-white mb-1']) }}>
    {{ $value ?? $slot }}
</label>
