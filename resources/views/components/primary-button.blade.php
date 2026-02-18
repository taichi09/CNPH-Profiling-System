<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center justify-center w-full px-4 py-3 rounded-lg font-bold text-xs text-white uppercase tracking-widest focus:outline-none transition ease-in-out duration-150 bg-[#02522D] hover:bg-[#053d22] active:bg-[#053d22]']) }}>
    {{ $slot }}
</button>
