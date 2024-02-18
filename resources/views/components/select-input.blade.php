<div>
    <select
        {{ $attributes->merge(['class' => 'outline-none w-full border border-filterInput bg-transparent h-[44px] px-2 py-1 rounded-lg text-normal font-normal text-filter_text' ])}}
    >
       {{$slot}}
    </select>
</div>
