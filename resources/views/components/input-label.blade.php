{{-- @props(['value'])

<label {{ $attributes->merge(['class' => 'block text-xs font-bold uppercase tracking-widest text-white mb-1']) }}>
    {{ $value ?? $slot }}
</label> --}}

@props(['value'])

<label {{ $attributes->twMerge(['class' => 'block text-xs font-bold uppercase tracking-widest text-white mb-1']) }}>
    {{ $value ?? $slot }}
</label>