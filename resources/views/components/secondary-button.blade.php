<button {{ $attributes->merge(['type' => 'button', 'class' =>
' items-center px-6 py-3 rounded-md font-semibold bg-transparent text-natural text-normal rounded-lg border border-primary_color']) }}>
    {{ $slot }}
</button>
