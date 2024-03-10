@extends('layouts.app')
@section('title', 'user management')
@section('page', 'User Management')
@push('header-links')
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
    <link rel="stylesheet" href="{{asset('assets/timepicker/jquery.timepicker.min.css')}}">
@endpush
@section('content')
 <!-- <div class="font-big text-big text-natural">Add new Site</div> -->
 <div class="font-big text-big text-natural mb-2 flex flex-row justify-between">
    <div>Edit user profile</div>
    <a
        class="font-big text-normal text-primary_color rounded-lg border border-primary_color px-[16px] py-[10px] cursor-pointer bg-transparent"
        href="{{route('company.users.index')}}">
        Manage Users
    </a>
</div>
<form class="mt-[2%] w-[100%]" action="" method="POST" enctype="multipart/form-data">
    @method('patch')
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

    <div class="flex flex-row justify-between mb-2 max-lg:flex-col">
        <div class="w-[48%] mb-2 max-lg:w-full max-lg:mb-2">
            <label class="font-big text-normal text-natural">Select company</label>
            <select
                class="outline-none w-full border border-filterInput bg-transparent h-[44px] px-2 py-1 rounded-lg text-normal font-normal text-filter_text"
                name="company"
            >
                <option>Select company</option>
            </select>
            <x-input-error :messages="$errors->get('company')" class="mt-2"/>
        </div>
        <div class="w-[48%] mb-2 max-lg:w-full max-lg:mb-2">
            <label class="font-big text-normal text-natural"> Select site</label>
            <select
                class="outline-none w-full border border-filterInput bg-transparent h-[44px] px-2 py-1 rounded-lg text-normal font-normal text-filter_text"
                name="site_id"
            >
                <option>Select Site</option>
                {{-- @foreach($sites as $site)
                    <option
                        value="{{$site->id}}" {{$user->site->id ==  $site->id ? 'selected' : ''}}>{{$site->name}}</option>
                @endforeach --}}
            </select>
            <x-input-error :messages="$errors->get('site_id')" class="mt-2"/>
        </div>
    </div>

    <div class="flex flex-row justify-between mb-2 max-lg:flex-col">
        <div class="w-[48%] max-lg:w-full max-lg:mb-2">
            <label class="font-big text-normal text-natural">Phone number</label>
            <input
                type="text"
                class="w-full border border-natural bg-transparent h-11 px-2 py-1 rounded-lg text-natural
                        placeholder-color font-normal text-normal
                        focus:outline-none focus:border-primary_color focus:ring-1 focus:ring-background_color
                        focus:invalid:error focus:invalid:error
                        "
                placeholder="Phone number" name="phone_number" value=""/>
            <x-input-error :messages="$errors->get('phone_number')" class="mt-2"/>
        </div>
        <div class="w-[48%] max-lg:w-full">
            <label class="font-big text-normal text-natural">Address</label>
            <input
                type="text"
                class="w-full border border-natural bg-transparent h-[44px] px-2 py-1 rounded-lg text-natural
                        placeholder-color font-normal text-normal
                        focus:outline-none focus:border-primary_color focus:ring-1 focus:ring-background_color
                        focus:invalid:error focus:invalid:error
                        "
                placeholder="" name="address" value=""/>
            <x-input-error :messages="$errors->get('address')" class="mt-2"/>
        </div>
    </div>

    <div class="flex flex-row justify-between mb-2 max-lg:flex-col">
        <div class="w-[48%] max-lg:w-full max-lg:mb-2">
            <label class="font-big text-normal text-natural">Shift start time</label>
            <input
                type="text"
                class="w-full border border-natural bg-transparent h-11 px-2 py-1 rounded-lg text-natural
                        placeholder-color font-normal text-normal
                        focus:outline-none focus:border-primary_color focus:ring-1 focus:ring-background_color
                        focus:invalid:error focus:invalid:error shift_start_time_timepicker"
                placeholder="" name="shift_start_time" value=""/>
            <x-input-error :messages="$errors->get('shift_start_time')" class="mt-2"/>
        </div>
        <div class="w-[48%] max-lg:w-full">
            <label class="font-big text-normal text-natural">Shift end time</label>
            <input
                type="text"
                class="w-full border border-natural bg-transparent h-[44px] px-2 py-1 rounded-lg text-natural
                        placeholder-color font-normal text-normal
                        focus:outline-none focus:border-primary_color focus:ring-1 focus:ring-background_color
                        focus:invalid:error focus:invalid:error shift_end_time_timepicker"
                placeholder="" name="shift_end_time" value=""/>
            <x-input-error :messages="$errors->get('shift_end_time')" class="mt-2"/>
        </div>
    </div>

    <div class="flex flex-row justify-between mb-2 max-lg:flex-col">
        <div class="w-[48%] max-lg:w-full max-lg:mb-2">
            <label class="font-big text-normal text-natural">Normal rate per hour</label>
            <input
                type="text"
                class="w-full border border-natural bg-transparent h-11 px-2 py-1 rounded-lg text-natural
                        placeholder-color font-normal text-normal
                        focus:outline-none focus:border-primary_color focus:ring-1 focus:ring-background_color
                        focus:invalid:error focus:invalid:error
                        "
                placeholder="" name="normal_rate_per_hour" value=""/>
            <x-input-error :messages="$errors->get('normal_rate_per_hour')" class="mt-2"/>
        </div>
        <div class="w-[48%] max-lg:w-full">
            <label class="font-big text-normal text-natural">Sunday rate per hour</label>
            <input
                type="text"
                class="w-full border border-natural bg-transparent h-[44px] px-2 py-1 rounded-lg text-natural
                        placeholder-color font-normal text-normal
                        focus:outline-none focus:border-primary_color focus:ring-1 focus:ring-background_color"
                placeholder="" name="sunday_rate_per_hour" value=""/>
            <x-input-error :messages="$errors->get('sunday_rate_per_hour')" class="mt-2"/>
        </div>
    </div>

    <div class="flex flex-row justify-between mb-2 max-lg:flex-col">
        <div class="w-[48%] max-lg:w-full max-lg:mb-2">
            <label class="font-big text-normal text-natural">Holiday rate per hour</label>
            <input
                type="text"
                class="w-full border border-natural bg-transparent h-11 px-2 py-1 rounded-lg text-natural
                        placeholder-color font-normal text-normal
                        focus:outline-none focus:border-primary_color focus:ring-1 focus:ring-background_color
                        focus:invalid:error focus:invalid:error
                        "
                placeholder="" name="holiday_rate_per_hour" value=""/>
            <x-input-error :messages="$errors->get('holiday_rate_per_hour')" class="mt-2"/>
        </div>
        <div class="w-[48%] max-lg:w-full">
            <label class="font-big text-normal text-natural">Number of night shift</label>
            <input
                type="text"
                class="w-full border border-natural bg-transparent h-[44px] px-2 py-1 rounded-lg text-natural
                        placeholder-color font-normal text-normal
                        focus:outline-none focus:border-primary_color focus:ring-1 focus:ring-background_color
                        focus:invalid:error focus:invalid:error
                        "
                placeholder="" name="number_of_night_shift" value=""/>
            <x-input-error :messages="$errors->get('number_of_night_shift')" class="mt-2"/>
        </div>
    </div>

    <div class="w-full  mb-2">
        <label class="font-big text-normal text-natural">Night Shift allowance</label>
        <input
            type="text"
            class="w-full border border-natural bg-transparent h-[44px] px-2 py-1 rounded-lg text-natural
                    placeholder-color font-normal text-normal
                    focus:outline-none focus:border-primary_color focus:ring-1 focus:ring-background_color
                    focus:invalid:error focus:invalid:error
                    "
            placeholder="" name="night_shift_allowance" value=""/>
        <x-input-error :messages="$errors->get('night_shift_allowance')" class="mt-2"/>
    </div>

    <div class="w-full  mb-2">
        <label class="font-big text-normal text-natural">Photo</label>
        <input
            type="file"
            class="w-full border border-natural bg-transparent h-[44px] px-2 py-1 rounded-lg text-natural
                    placeholder-color font-normal text-normal"
            placeholder="" name="profile_image" onchange="readImageURL(this);" accept=".jpg, .jpeg, .png"/>
        <x-input-error :messages="$errors->get('profile_image')" class="mt-2"/>
    </div>

    <button class="mt-[1%] w-[60px] h-[40px] bg-primary_color rounded-lg text-normal text-natural font-big">Add</button>
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

    function readImageURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#profile_image').attr('src', e.target.result).width(250).height(250);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endpush
