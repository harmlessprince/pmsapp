<button
        {{ $attributes->merge(['class' => 'bg-transparent transition-transform   font-medium rounded-lg text-medium px-5 py-2.5 text-center inline-flex items-center me-2']) }}
        >
    {{$slot}}
</button>
