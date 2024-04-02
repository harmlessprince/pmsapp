@extends('layouts.app')
@section('title', 'Dashboard')
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
    <form class="mt-[2%] w-[100%]" action="{{route('company.users.update', ['user' => $user])}}" method="POST" enctype="multipart/form-data">
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
                    placeholder="First name" name="first_name" value="{{$user->first_name}}"/>
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
                    placeholder="Name" name="last_name" value="{{$user->last_name}}"/>
                <x-input-error :messages="$errors->get('last_name')" class="mt-2"/>
            </div>
        </div>
        <div class="flex flex-row justify-between mb-2  max-lg:flex-col">
            <div class="w-[48%] max-lg:w-full max-lg:mb-2">
                <label class="font-big text-normal text-natural"> Site</label>
                <select
                    class="outline-none w-full border border-filterInput bg-transparent h-[44px] px-2 py-1 rounded-lg text-normal font-normal text-filter_text"
                    name="site_id"
                >
                    <option>Select Site</option>
                    @foreach($sites as $site)
                        <option
                            value="{{$site->id}}" {{optional($user->site)->id ==  $site->id ? 'selected' : ''}}>{{$site->name}}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('site_id')" class="mt-2"/>
            </div>
            <div class="w-[48%] max-lg:w-full">
                <label class="font-big text-normal text-natural"> State</label>
                <select
                    class="outline-none w-full border border-filterInput bg-transparent h-[44px] px-2 py-1 rounded-lg text-normal font-normal text-filter_text"
                    name="state_id"
                >
                    <option>Select State</option>
                    @foreach($states as $state)
                        <option
                            value="{{$state->id}}" {{optional($user->state)->id ==  $state->id ? 'selected' : ''}}>{{$state->name}}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('state_id')" class="mt-2"/>
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
                    placeholder="Phone number" name="phone_number" value="{{$user->phone_number}}"/>
                <x-input-error :messages="$errors->get('phone_number')" class="mt-2"/>
            </div>
            <div class="w-[48%] max-lg:w-full">
                <x-input-label for="address" :value="__('Address')" class="text-white"/>
                <x-text-input name="address" :value="$user->address"/>
                <x-input-error :messages="$errors->get('address')" class="mt-2"/>
            </div>
        </div>

        <div class="flex flex-row justify-between mb-2 max-lg:flex-col">
            <div class="w-[48%] max-lg:w-full max-lg:mb-2">
                <x-input-label for="shift_start_time" :value="__('Shift start time')" class="text-white"/>
                <x-text-input name="shift_start_time" :value="$user->shift_start_time ?? '00:00'" class="" id="time" type="time"/>
                <x-input-error :messages="$errors->get('shift_start_time')" class="mt-2"/>
            </div>
            <div class="w-[48%] max-lg:w-full">
                <x-input-label for="shift_end_time" :value="__('Shift end time')" class="text-white"/>
                <x-text-input name="shift_end_time" :value="$user->shift_end_time ?? '23:59'" class="" id="time" type="time"/>
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
                    placeholder="" name="normal_rate_per_hour" value="{{$user->normal_rate_per_hour}}"/>
                <x-input-error :messages="$errors->get('normal_rate_per_hour')" class="mt-2"/>
            </div>
            <div class="w-[48%] max-lg:w-full">
                <label class="font-big text-normal text-natural">Sunday rate per hour</label>
                <input
                    type="text"
                    class="w-full border border-natural bg-transparent h-[44px] px-2 py-1 rounded-lg text-natural
                            placeholder-color font-normal text-normal
                            focus:outline-none focus:border-primary_color focus:ring-1 focus:ring-background_color"
                    placeholder="" name="sunday_rate_per_hour" value="{{$user->sunday_rate_per_hour}}"/>
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
                    placeholder="" name="holiday_rate_per_hour" value="{{$user->holiday_rate_per_hour}}"/>
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
                    placeholder="" name="number_of_night_shift" value="{{$user->number_of_night_shift}}"/>
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
                placeholder="" name="night_shift_allowance" value="{{$user->night_shift_allowance}}"/>
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
            <div class="mt-2 w-60 h-60">
                <img src="{{$user->profile_image}}" alt="profile image" class="w-60 h-60" id="profile_image">
            </div>
        </div>

        <button class="mt-[1%] w-[60px] h-[40px] bg-primary_color rounded-lg text-normal text-natural font-big">update
        </button>
    </form>

@endsection
@push('scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="{{asset('assets/timepicker/jquery.timepicker.min.js')}}"></script>
    <script>
        $(document).ready(function () {

            $('.shift_start_time_timepicker').timepicker({
                listWidth: 10
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
