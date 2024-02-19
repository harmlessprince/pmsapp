<button {{ $attributes->merge(['type' => 'button', 'class' =>' bg-[#3DC9B7] inline-flex items-center px-6 py-3 font-semibold  outline-none text-natural text-normal rounded-lg']) }}>
    {{ $slot }}
</button>
