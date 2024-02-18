@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'w-full border border-natural bg-transparent h-11 px-2 py-1 rounded-lg text-natural
                            placeholder-color font-normal text-normal
                            focus:outline-none focus:border-primary_color focus:ring-1 focus:ring-background_color
                     ']) !!}>
