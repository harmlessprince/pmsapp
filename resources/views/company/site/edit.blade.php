@extends('layouts.app')
@section('title', 'Site Management')
@section('page', 'Site Management')
@push('header-links')
    <link rel="stylesheet" href="{{asset('assets/timepicker/jquery.timepicker.min.css')}}">
    <script src="https://cdn.tailwindcss.com"></script>
@endpush
@section('content')

    @include('company.site.change_password_modal', ['site' => $site])
    @include('company.site.change_logout_pin_modal',  ['site' => $site])


    <div class="font-big text-big text-natural mb-2 flex flex-row justify-between">
        <div>Edit Site ({{$site->name}})</div>

        <button
            class="font-big text-normal text-white rounded-lg border-none bg-red-700 px-[16px] py-[10px] cursor-pointer focus:outline-none text-white"
            id="show_change_password_dialog"
            data-modal-target="changePasswordModal"
            data-modal-toggle="changePasswordModal"
            {{--            onclick="showChangePasswordModal()"--}}
        >
            Change Site Password
        </button>
        <button
            class="font-big text-normal text-white rounded-lg px-[16px] py-[10px] cursor-pointer bg-yellow-500"
            data-modal-target="changeLogoutModal"
            data-modal-toggle="changeLogoutModal"
        >
            Change Site Logout Pin
        </button>
        <a
            class="font-big text-normal text-primary_color rounded-lg border border-primary_color px-[16px] py-[10px] cursor-pointer bg-transparent"
            href="{{route('company.sites.index')}}"
        >
            Manage Sites
        </a>
    </div>
    <form class="mt-[2%] w-[100%]" action="{{route('company.sites.update', ['site' => $site])}}" method="POST"
          enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="flex flex-row justify-between mb-2 max-lg:flex-col">
            <div class="w-[48%] max-lg:w-[100%] max-lg:mb-2">
                <x-input-label for="name" :value="__('Site Name')"/>
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$site->name"
                              required/>
                <x-input-error :messages="$errors->get('name')" class="mt-2"/>
            </div>
            <div class="w-[48%] max-lg:w-[100%]">
                <x-input-label for="email" :value="__('Email')"/>
                <x-text-input id="email" class="block mt-1 w-full" type="text" name="email"
                              :value="$site->inspector->email"
                              required/>
                <x-input-error :messages="$errors->get('email')" class="mt-2"/>
            </div>
        </div>

        {{--        <div class="flex flex-row justify-between mb-2 max-lg:flex-col">--}}
        {{--            <div class="w-[48%] max-lg:w-[100%]  mb-2">--}}
        {{--                <x-input-label for="password" :value="__('Password')"/>--}}
        {{--                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password"--}}
        {{--                              :value="old('password')" required/>--}}
        {{--                <x-input-error :messages="$errors->get('password')" class="mt-2"/>--}}
        {{--            </div>--}}
        {{--            <div class="w-[48%] max-lg:w-[100%]">--}}
        {{--                <x-input-label for="confirm_password" :value="__('Confirm Password')"/>--}}
        {{--                <x-text-input id="confirm_password" class="block mt-1 w-full" type="password"--}}
        {{--                              name="confirm_password"--}}
        {{--                              required/>--}}
        {{--                <x-input-error :messages="$errors->get('confirm_password')" class="mt-2"/>--}}
        {{--            </div>--}}
        {{--        </div>--}}


        <div class="w-full  mb-2">
            <x-input-label for="address" :value="__('Address')"/>
            <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="$site->address"
                          required/>
            <x-input-error :messages="$errors->get('address')" class="mt-2"/>
        </div>

        <div class="flex flex-row justify-between mb-2 max-lg:flex-col">
            <div class="w-[48%] max-lg:w-[100%]  max-lg:mb-2">
                <x-input-label for="shift_start_time" :value="__('Shift start time')"/>
                <x-text-input id="shift_start_time" class="block mt-1 w-full shift_start_time_timepicker"
                              type="text" :value="$site->shift_start_time" name="shift_start_time"
                              required/>
                <x-input-error :messages="$errors->get('shift_start_time')" class="mt-2"/>
            </div>
            <div class="w-[48%]  max-lg:w-[100%]">
                <x-input-label for="shift_end_time" :value="__('Shift end time')"/>
                <x-text-input id="shift_end_time" class="block mt-1 w-full shift_end_time_timepicker" type="text"
                              name="shift_end_time" :value="$site->shift_end_time" required/>
                <x-input-error :messages="$errors->get('shift_end_time')" class="mt-2"/>
            </div>
        </div>

        <div class="flex flex-row justify-between mb-2 max-lg:flex-col">
            <div class="w-[48%] max-lg:w-full max-lg:mb-2">
                <x-input-label for="number_of_tags" :value="__('Number of Tags')"/>
                <x-text-input id="number_of_tags" class="block mt-1 w-full" type="number" name="number_of_tags"
                              :value="$site->number_of_tags" required/>
                <x-input-error :messages="$errors->get('number_of_tags')" class="mt-2"/>
            </div>
            <div class="w-[48%] max-lg:w-full">
                <x-input-label for="maximum_number_of_rounds" :value="__('Number of Rounds')"/>
                <x-text-input id="maximum_number_of_rounds" class="block mt-1 w-full" type="number"
                              name="maximum_number_of_rounds" required :value="$site->maximum_number_of_rounds"/>
                <x-input-error :messages="$errors->get('maximum_number_of_rounds')" class="mt-2"/>
            </div>
        </div>
        <div class="flex flex-row justify-between mb-2 max-lg:flex-col">
            {{--            <div class="w-[48%] max-lg:w-full max-lg:mb-2">--}}
            {{--                <x-input-label for="logout_pin" :value="__('Logout Pin')"/>--}}
            {{--                <x-text-input id="logout_pin" class="block mt-1 w-full" type="text" name="logout_pin" required/>--}}
            {{--                <x-input-error :messages="$errors->get('logout_pin')" :value="old('logout_pin')" class="mt-2"/>--}}
            {{--            </div>--}}
            <div class="w-[100%] max-lg:w-full">
                <x-input-label for="state" :value="__('State')"/>
                <x-select-input id="state_id" class="block mt-1 w-full" name="state">
                    <option>Select State</option>
                    @foreach($states as $state)
                        <option
                            value="{{$state->id}}" {{$site->state_id ==  $state->id ? 'selected' : ''}}>{{$state->name}}</option>
                    @endforeach
                </x-select-input>
                <x-input-error :messages="$errors->get('state')" class="mt-2"/>
            </div>
        </div>
        <div class="w-full mb-2">
            <label class="font-big text-normal text-natural">Search Location</label>
            <x-input-label for="location" :value="__('Search Location')"/>
            <x-text-input id="location" class="block mt-1 w-full" type="text" name="location"/>
            <x-input-error :messages="$errors->get('location')" class="mt-2"/>
        </div>
        <div class="flex flex-row justify-between mb-2 max-lg:flex-col">
            <div class="w-[48%] max-lg:w-full max-lg:mb-2">
                <x-input-label for="longitude" :value="'longitude'"/>
                <x-text-input id="longitude" class="block mt-1 w-full" type="number" name="longitude"
                              :value="$site->longitude" readonly/>
                <x-input-error :messages="$errors->get('longitude')" class="mt-2"/>
            </div>
            <div class="w-[48%] max-lg:w-full">
                <x-input-label for="latitude" :value="__('latitude')"/>
                <x-text-input id="latitude" class="block mt-1 w-full" type="number" name="latitude"
                              :value="$site->latitude" readonly/>
                <x-input-error :messages="$errors->get('latitude')" class="mt-2"/>
            </div>
        </div>
        <div class="w-full mb-2">
            <div id="searchLocationMap" style="height: 400px; width: 100%;"></div>
        </div>
        <div class="w-full  mb-2">
            <x-input-label for="photo" :value="__('Photo')"/>
            <x-text-input id="photo" class="block mt-1 w-full" type="file" name="photo" onchange="readImageURL(this);"
                          accept=".jpg, .jpeg, .png"/>
            <x-input-error :messages="$errors->get('photo')" class="mt-2"/>
            <div class="mt-2 w-60 h-60">
                <img src="{{$site->photo}}" alt="profile image" class="w-60 h-60" id="site_photo">
            </div>
        </div>


        <button class="mt-[1%] w-[60px] h-[40px] bg-primary_color rounded-lg text-normal text-natural font-big"
                type="submit">
            Update
        </button>
    </form>

@endsection

@push('scripts')
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    {{--    https://www.jqueryscript.net/demo/Customizable-jQuery-Timepicker-Plugin-timepicker/--}}
    <script src="{{asset('assets/timepicker/jquery.timepicker.min.js')}}"></script>

    <script>
        function readImageURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#site_photo').attr('src', e.target.result).width(250).height(250);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

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

