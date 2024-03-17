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
    <div>Create User</div>
    <a
        class="font-big text-normal text-primary_color rounded-lg border border-primary_color px-[16px] py-[10px] cursor-pointer bg-transparent"
        href="{{route('admin.users.index')}}">
        Manage Users
    </a>
</div>
<form class="mt-[2%] w-[100%]" action="{{route('admin.users.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="grid gap-6 mb-6 md:grid-cols-2">
        <div class="flex flex-col">
            <x-input-label for="first_name" :value="__('First Name')"/>
            <x-text-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name')"
                          required/>
            <x-input-error :messages="$errors->get('first_name')" class="mt-2"/>
        </div>
        <div class="flex flex-col">
            <x-input-label for="last_name" :value="__('Last Name')"/>
            <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')"
                          required/>
            <x-input-error :messages="$errors->get('last_name')" class="mt-2"/>
        </div>
        <div class="flex flex-col">
            <x-input-label for="phone_number" :value="__('Phone Numbers')"/>
            <x-text-input id="phone_number" class="block mt-1 w-full"  name="phone_number" :value="old('phone_number')" required/>
            <x-input-error :messages="$errors->get('phone_number')" class="mt-2"/>
        </div>
        <div class="flex flex-col">
            <x-input-label for="address" :value="__('Address')"/>
            <x-text-input id="address" class="block mt-1 w-full" type="text"
                          name="address" required :value="old('address')"/>
            <x-input-error :messages="$errors->get('address')" class="mt-2"/>
        </div>
    </div>


    <div class="grid gap-6 mb-6 md:grid-cols-2">
        <div class="flex flex-col">
            <x-input-label for="company_id" :value="__('Select Company')"/>
            <x-select-input id="company_id" class="block mt-1 w-full" name="company_id">
                <option value="">Select Company</option>
                @foreach($companies as $company)
                    <option
                        value="{{$company->id}}" {{ request()->query('company_id') == $company->id ? "selected" : '' }}>{{$company->name}}</option>
                @endforeach
            </x-select-input>
            <x-input-error :messages="$errors->get('company_id')" class="mt-2"/>
        </div>
        <div class="flex flex-col">
            <div class="flex flex-row items-center h-6">
            <x-input-label for="site_id" :value="__('Site')" class="text-white"/>
            <x-loader/>
            </div>
            <x-select-input id="site_id" class="block w-full" name="site_id">
                <option class="" value="">Select a site</option>
            </x-select-input>
            <x-input-error :messages="$errors->get('site_id')" class="mt-2"/>
        </div>
    </div>

    <div class="flex flex-row justify-between mb-2 max-lg:flex-col">
        <div class="w-[49%] max-lg:w-full max-lg:mb-2">
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
        <div class="w-[49%] max-lg:w-full">
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
        <div class="w-[49%] max-lg:w-full max-lg:mb-2">
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
        <div class="w-[49%] max-lg:w-full">
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
        <div class="w-[49%] max-lg:w-full max-lg:mb-2">
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
        <div class="w-[49%] max-lg:w-full">
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
    const selectSite = document.getElementById("site_id");
    const selectCompany = document.getElementById("company_id");
    $(document).ready(function () {

        $('.shift_start_time_timepicker').timepicker({
            listWidth: 1
        });
        $('.shift_end_time_timepicker').timepicker({
            listWidth: 1
        });
        selectSite.disabled = true;
        const companyParamValue = getQueryParamValue('company_id');
        console.log(companyParamValue)
        if (companyParamValue != null) {
            getCompanySites(companyParamValue)
        }
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
    selectCompany.addEventListener("change", function (e) {
        getCompanySites(e.target.value)
    });
</script>
@endpush

