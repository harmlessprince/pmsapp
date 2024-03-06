<button {{ $attributes->merge(['type' => 'button', 'class' =>' bg-[#3DC9B7] items-center text-center font-semibold  outline-none text-natural text-normal rounded-lg']) }}>
    {{ $slot }}
</button>
