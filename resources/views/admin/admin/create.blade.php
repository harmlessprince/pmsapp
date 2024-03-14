@extends('layouts.app')
@section('title', 'Create Admin')
@section('page', 'Admin Management')
@section('content')

    <div class="font-big text-big text-natural mb-2 flex flex-row justify-between">
        <div>Add New Admin</div>
    </div>

    <form class="mt-[2%] w-[100%]" action="{{route('admin.admin.store')}}" method="POST">
        @csrf
        <div class="grid gap-6 mb-6 md:grid-cols-2">
            <div class="flex flex-col">
                <x-input-label for="first_name" :value="__('First Name')"/>
                <x-text-input id="first_name" class="block mt-1 w-full" type="text" name="first_name"
                              :value="old('first_name')"
                              required/>
                <x-input-error :messages="$errors->get('first_name')" class="mt-2"/>
            </div>
            <div class="flex flex-col">
                <x-input-label for="last_name" :value="__('Last Name')"/>
                <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name"
                              :value="old('last_name')"
                              required/>
                <x-input-error :messages="$errors->get('last_name')" class="mt-2"/>
            </div>
        </div>
        <div class="grid gap-6 mb-6 md:grid-cols-2">
            <div class="flex flex-col">
                <x-input-label for="email" :value="__('Email')"/>
                <x-text-input id="email" class="block mt-1 w-full" type="text" name="email" :value="old('email')"
                              required/>
                <x-input-error :messages="$errors->get('email')" class="mt-2"/>
            </div>
            <div class="flex flex-col">
                <x-input-label for="status" :value="__('Status')"/>
                <x-select-input id="status" class="block mt-1 w-full" name="status">
                    <option>Select Status</option>
                    <option value="1" {{old('status')  == 1 ? 'selected' : ''}}>Active</option>
                    <option value="0" {{old('status')   == 0 ? 'selected' : ''}}>In Active</option>
                </x-select-input>
                <x-input-error :messages="$errors->get('status')" class="mt-2"/>
            </div>
        </div>

        <div class="grid gap-6 mb-4 md:grid-cols-2">
            <div class="flex flex-col">
                <x-input-label for="password" :value="__('Password')"/>
                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password"
                              :value="old('password')" required/>
                <x-input-error :messages="$errors->get('password')" class="mt-2"/>
            </div>
            <div class="flex flex-col">
                <x-input-label for="confirm_password" :value="__('Confirm Password')"/>
                <x-text-input id="confirm_password" class="block mt-1 w-full" type="password" name="confirm_password"
                              required/>
                <x-input-error :messages="$errors->get('confirm_password')" class="mt-2"/>
            </div>
        </div>

        <button class="mt-[1%] w-[60px] h-[40px] bg-primary_color rounded-lg text-normal text-natural font-big"
                type="submit">
            Add
        </button>
    </form>

@endsection
