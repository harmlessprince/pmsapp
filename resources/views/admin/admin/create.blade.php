@extends('layouts.app')
@section('title', 'Create Admin')
@section('page', 'Admin')
@section('content')

<div class="font-big text-big text-natural mb-2 flex flex-row justify-between">
    <div>Add new Admin</div>
</div>

<form class="mt-[2%] w-[100%]" action="" method="POST">
    @csrf
    <div class="flex flex-row justify-between mb-2  max-lg:flex-col">
        <div class="w-[48%] max-lg:w-full max-lg:mb-2">
            <label class="font-big text-normal text-natural">First name</label>
            <input
                type="text"
                class="w-full border border-natural bg-transparent h-11 px-2 py-1 rounded-lg text-natural
                        placeholder-color font-normal text-normal
                        focus:outline-none focus:border-primary_color focus:ring-1 focus:ring-background_color
                        focus:invalid:error focus:invalid:error
                        "
                placeholder="First name" name="first_name" value=""/>
            <x-input-error :messages="$errors->get('first_name')" class="mt-2"/>
        </div>
        <div class="w-[48%] max-lg:w-full">
            <label class="font-big text-normal text-natural">Last name</label>
            <input
                type="text"
                class="w-full border border-natural bg-transparent h-[44px] px-2 py-1 rounded-lg text-natural
                        placeholder-color font-normal text-normal
                        focus:outline-none focus:border-primary_color focus:ring-1 focus:ring-background_color
                        focus:invalid:error focus:invalid:error
                        "
                placeholder="Last name" name="last_name" value=""/>
            <x-input-error :messages="$errors->get('last_name')" class="mt-2"/>
        </div>
    </div>

    <div class="w-full mb-2 max-lg:w-[100%]">
        <x-input-label for="email" :value="__('Email')"/>
        <x-text-input id="email" class="block mt-1 w-full" type="text" name="email" :value="old('email')"
                      required/>
        <x-input-error :messages="$errors->get('email')" class="mt-2"/>
    </div>

    <div class="flex flex-row justify-between mb-2 max-lg:flex-col">
        <div class="w-[48%] max-lg:w-[100%]  mb-2">
            <x-input-label for="password" :value="__('Password')"/>
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password"
                          :value="old('password')" required/>
            <x-input-error :messages="$errors->get('password')" class="mt-2"/>
        </div>
        <div class="w-[48%] max-lg:w-[100%]">
            <x-input-label for="confirm_password" :value="__('Confirm Password')"/>
            <x-text-input id="confirm_password" class="block mt-1 w-full" type="password" name="confirm_password"
                          required/>
            <x-input-error :messages="$errors->get('confirm_password')" class="mt-2"/>
        </div>
    </div>

    <button class="mt-[1%] w-[60px] h-[40px] bg-primary_color rounded-lg text-normal text-natural font-big" type="submit">
        Add
    </button>
</form>

@endsection