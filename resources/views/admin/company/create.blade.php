@extends('layouts.app')
@section('title', 'Company')
@section('page', 'Company')
@push('header-links')
    <link rel="stylesheet" href="{{asset('assets/timepicker/jquery.timepicker.min.css')}}">
@endpush
@section('content')

    <div class="font-big text-big text-natural mb-2 flex flex-row justify-between">
        <div>Add new Company</div>
        <a
            class="font-big text-normal text-primary_color rounded-lg border border-primary_color px-[16px] py-[10px] cursor-pointer bg-transparent"
            href="{{route('company.sites.index')}}"
        >
            Manage Companies
        </a>
    </div>
    <form class="mt-[2%] w-[100%]" action="" method="POST">
        @csrf
        <div class="flex flex-row justify-between mb-2 max-lg:flex-col">
            <div class="w-[48%] max-lg:w-[100%] max-lg:mb-2">
                <x-input-label for="city" :value="__('City')"/>
                <x-text-input id="city" class="block mt-1 w-full" type="text" name="city" :value="old('city')"
                              required/>
                <x-input-error :messages="$errors->get('city')" class="mt-2"/>
            </div>
            <div class="w-[48%] max-lg:w-[100%]">
                <x-input-label for="display_name" :value="__('Display name')"/>
                <x-text-input id="display_name" class="block mt-1 w-full" type="text" name="display_name" :value="old('display_name')"
                              required/>
                <x-input-error :messages="$errors->get('display_name')" class="mt-2"/>
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

        <div class="flex flex-row justify-between mb-2 max-lg:flex-col">
            <div class="w-[48%] max-lg:w-full max-lg:mb-2">
                <x-input-label for="tags" :value="__('Tags')"/>
                <x-text-input id="tags" class="block mt-1 w-full" type="number" name="number_of_tags" :value="old('tags')" required/>
                <x-input-error :messages="$errors->get('tags')" class="mt-2"/>
            </div>
            <div class="w-[48%] max-lg:w-full">
                <x-input-label for="name" :value="__('Name')"/>
                <x-text-input id="name" class="block mt-1 w-full" type="text"
                              name="name" required :value="old('name')"/>
                <x-input-error :messages="$errors->get('name')" class="mt-2"/>
            </div>
        </div>

        <div class="flex flex-row justify-between mb-2 max-lg:flex-col">
            <div class="w-[48%] max-lg:w-full max-lg:mb-2">
                <x-input-label for="phone" :value="__('Phone Numbers')"/>
                <x-text-input id="phone" class="block mt-1 w-full" type="number" name="phone" :value="old('phone')" required/>
                <x-input-error :messages="$errors->get('phone')" class="mt-2"/>
            </div>
            <div class="w-[48%] max-lg:w-full">
                <x-input-label for="postal_address" :value="__('Postal Address')"/>
                <x-text-input id="postal_address" class="block mt-1 w-full" type="text"
                              name="postal_address" required :value="old('postal_address')"/>
                <x-input-error :messages="$errors->get('postal_address')" class="mt-2"/>
            </div>
        </div>

        <div class="flex flex-row justify-between mb-2 max-lg:flex-col">
            <div class="w-[48%] max-lg:w-full mb-2">
                <x-input-label for="status" :value="__('Status')"/>
                <x-select-input id="status" class="block mt-1 w-full" name="status">
                    <option>Select Status</option>
                    {{-- @foreach($states as $state)
                        <option
                            value="{{$state->id}}" {{old('state_id') ==  $state->id ? 'selected' : ''}}>{{$state->name}}</option>
                    @endforeach --}}
                </x-select-input>
                <x-input-error :messages="$errors->get('status')" class="mt-2"/>
            </div>
            <div class="w-[48%] max-lg:w-full">
                <x-input-label for="type" :value="__('Type')"/>
                <x-text-input id="type" class="block mt-1 w-full" type="text"
                              name="type" required :value="old('type')"/>
                <x-input-error :messages="$errors->get('type')" class="mt-2"/>
            </div>
        </div>

        <button class="mt-[1%] w-[60px] h-[40px] bg-primary_color rounded-lg text-normal text-natural font-big" type="submit">
            Add
        </button>
    </form>

@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    {{--    https://www.jqueryscript.net/demo/Customizable-jQuery-Timepicker-Plugin-timepicker/--}}
    <script src="{{asset('assets/timepicker/jquery.timepicker.min.js')}}"></script>
    <script>
        $(document).ready(function () {

            $('.shift_start_time_timepicker').timepicker({
                listWidth: 1
            });
            $('.shift_end_time_timepicker').timepicker({
                listWidth: 1
            });
        });
    </script>
@endpush
