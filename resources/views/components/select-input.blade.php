<div>
    <select
        {{ $attributes->merge(['class' => 'outline-none w-full border border-filterInput bg-transparent h-[44px] px-2 py-1 rounded-lg text-normal font-normal text-filter_text focus:outline-none focus:border-primary_color focus:ring-1 focus:ring-background_color' ])}}
    >
       {{$slot}}
    </select>
</div>
