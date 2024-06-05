@extends('layouts.app')
@section('title', 'Personnel')
@section('page', 'Personnel Management')
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
            href="{{route('admin.users.index')}}">
            Manage Personnel
        </a>
    </div>
    <form class="mt-[2%]" action="{{route('admin.users.update', ['user' => $user])}}" method="POST" enctype="multipart/form-data">
        @method('patch')
        @csrf
        <div class="grid gap-6 mb-6 md:grid-cols-2">
            <div class="flex flex-col">
                <x-input-label for="first_name" :value="__('First name')"/>
                <x-text-input id="first_name" class="block mt-1 w-full" type="text"
                              name="first_name" required :value="$user->first_name"/>
                <x-input-error :messages="$errors->get('first_name')" class="mt-2"/>
            </div>
            <div class="flex flex-col">
                <x-input-label for="last_name" :value="__('Last name')"/>
                <x-text-input id="last_name" class="block mt-1 w-full" type="text"
                              name="last_name" required :value="$user->last_name"/>
                <x-input-error :messages="$errors->get('last_name')" class="mt-2"/>
            </div>
        </div>
        <div class="grid gap-6 mb-6 md:grid-cols-3">
            <div class="flex flex-col">
                <x-input-label for="company_id" :value="__('Company')"/>
                <x-select-input id="company_id" class="block mt-1 w-full" name="company_id">
                    <option>Select Company</option>
                    @foreach($companies as $company)
                        <option
                            value="{{$company->id}}" {{optional($user->tenant)->id ==  $company->id ? 'selected' : ''}}>{{$company->name}}</option>
                    @endforeach
                </x-select-input>
                <x-input-error :messages="$errors->get('company_id')" class="mt-2"/>
            </div>
            <div class="flex flex-col">
                <div class="flex flex-row items-center h-5">
                <x-input-label for="site_id" :value="__('Site')" class="text-white"/>
                <x-loader/>
                </div>
                <x-select-input id="site_id" class="block mt-1 w-full" name="site_id">
                    <option>Select Site</option>
                    @foreach($sites as $site)
                        <option
                            value="{{$site->id}}" {{optional($user->site)->id ==  $site->id ? 'selected' : ''}}>{{$site->name}}</option>
                    @endforeach
                </x-select-input>
                <x-input-error :messages="$errors->get('site_id')" class="mt-2"/>
            </div>
            <div class="flex flex-col">
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


        <div class="grid gap-6 mb-6 md:grid-cols-2">
            <div class="flex flex-col">
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
            <div class="flex flex-col">
                <label class="font-big text-normal text-natural">Address</label>
                <input
                    type="text"
                    class="w-full border border-natural bg-transparent h-[44px] px-2 py-1 rounded-lg text-natural
                            placeholder-color font-normal text-normal
                            focus:outline-none focus:border-primary_color focus:ring-1 focus:ring-background_color
                            focus:invalid:error focus:invalid:error
                            "
                    placeholder="" name="address" value="{{$user->address}}"/>
                <x-input-error :messages="$errors->get('address')" class="mt-2"/>
            </div>
        </div>

        <div class="grid gap-6 mb-6 md:grid-cols-2">
            <div class="flex flex-col">
                <label class="font-big text-normal text-natural">Shift start time</label>
                <input
                    type="text"
                    class="w-full border border-natural bg-transparent h-11 px-2 py-1 rounded-lg text-natural
                            placeholder-color font-normal text-normal
                            focus:outline-none focus:border-primary_color focus:ring-1 focus:ring-background_color
                            focus:invalid:error focus:invalid:error shift_start_time_timepicker"
                    placeholder="" name="shift_start_time" value="{{$user->shift_start_time}}"/>
                <x-input-error :messages="$errors->get('shift_start_time')" class="mt-2"/>
            </div>
            <div class="flex flex-col">
                <label class="font-big text-normal text-natural">Shift end time</label>
                <input
                    type="text"
                    class="w-full border border-natural bg-transparent h-[44px] px-2 py-1 rounded-lg text-natural
                            placeholder-color font-normal text-normal
                            focus:outline-none focus:border-primary_color focus:ring-1 focus:ring-background_color
                            focus:invalid:error focus:invalid:error shift_end_time_timepicker"
                    placeholder="" name="shift_end_time" value="{{$user->shift_end_time}}"/>
                <x-input-error :messages="$errors->get('shift_end_time')" class="mt-2"/>
            </div>
        </div>

        <div class="grid gap-6 mb-6 md:grid-cols-2">
            <div class="flex flex-col">
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
            <div class="flex flex-col">
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

        <div class="grid gap-6 mb-6 md:grid-cols-2">
            <div class="flex flex-col">
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
            <div class="flex flex-col">
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
    {{--    https://www.jqueryscript.net/demo/Customizable-jQuery-Timepicker-Plugin-timepicker/--}}
    <script src="{{asset('assets/timepicker/jquery.timepicker.min.js')}}"></script>
    <script>
        const selectSite = document.getElementById("site_id");
        const selectCompany = document.getElementById("company_id");
        $(document).ready(function () {

            $('.shift_start_time_timepicker').timepicker({
                listWidth: 1
            });
            $('.shift_end_time_timepicker').timepicker({
                listWidth: 1
            });
        });

        selectCompany.addEventListener("change", function (e) {
            getCompanySites(e.target.value)
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
