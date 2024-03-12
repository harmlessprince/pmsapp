@extends('layouts.app')
@section('title', 'Company')
@section('page', 'Company')
@push('header-links')
    <link rel="stylesheet" href="{{asset('assets/timepicker/jquery.timepicker.min.css')}}">
@endpush
@section('content')
    @include('admin.company.change_password_modal', ['company' => $company])
    <div class="font-big text-big text-natural mb-2 flex flex-row justify-between">
        <div>Edit Company ({{$company->display_name}})</div>

        <button
            class="font-big text-normal text-white rounded-lg border-none bg-red-700 px-[16px] py-[10px] cursor-pointer focus:outline-none text-white"
            id="show_change_password_dialog"
            data-modal-target="changePasswordModal"
            data-modal-toggle="changePasswordModal"
        >
            Change Site Password
        </button>
        <a
            class="font-big text-normal text-primary_color rounded-lg border border-primary_color px-[16px] py-[10px] cursor-pointer bg-transparent"
            href="{{route('admin.companies.index')}}"
        >
            Manage Companies
        </a>
    </div>
    <form class="mt-[2%] w-[100%]" action="{{route('admin.companies.update',  ['company' => $company])}}" method="POST">
        @csrf
        @method('patch')
        <div class="grid gap-6 mb-6 md:grid-cols-2">
            <div class="flex flex-col">
                <x-input-label for="first_name" :value="__('First Name')"/>
                <x-text-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="$company->owner->first_name"
                              required/>
                <x-input-error :messages="$errors->get('first_name')" class="mt-2"/>
            </div>
            <div class="flex flex-col">
                <x-input-label for="last_name" :value="__('Last Name')"/>
                <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="$company->owner->last_name"
                              required/>
                <x-input-error :messages="$errors->get('last_name')" class="mt-2"/>
            </div>
            <div class="flex flex-col">
                <x-input-label for="display_name" :value="__('Display name')"/>
                <x-text-input id="display_name" class="block mt-1 w-full" type="text" name="display_name" :value="$company->display_name"
                              required/>
                <x-input-error :messages="$errors->get('display_name')" class="mt-2"/>
            </div>
            <div class="flex flex-col">
                <x-input-label for="email" :value="__('Email')"/>
                <x-text-input id="email" class="block mt-1 w-full" type="text" name="email" :value="$company->owner->email"
                              required/>
                <x-input-error :messages="$errors->get('email')" class="mt-2"/>
            </div>
            <div class="flex flex-col">
                <x-input-label for="phone_number" :value="__('Phone Numbers')"/>
                <x-text-input id="phone_number" class="block mt-1 w-full"  name="phone_number" :value="$company->phone_number" required/>
                <x-input-error :messages="$errors->get('phone_number')" class="mt-2"/>
            </div>
            <div class="flex flex-col">
                <x-input-label for="address" :value="__('Address')"/>
                <x-text-input id="address" class="block mt-1 w-full" type="text"
                              name="address" required :value="$company->address"/>
                <x-input-error :messages="$errors->get('address')" class="mt-2"/>
            </div>
        </div>
        <div class="grid gap-6 mb-6 md:grid-cols-2">
            <div class="flex flex-col">
                <x-input-label for="maximum_number_of_tags" :value="__('Tags')"/>
                <x-text-input id="maximum_number_of_tags" class="block mt-1 w-full" type="number" name="maximum_number_of_tags" :value="$company->maximum_number_of_tags" required/>
                <x-input-error :messages="$errors->get('maximum_number_of_tags')" class="mt-2"/>
            </div>
            <div class="flex flex-col">
                <x-input-label for="industry_id" :value="__('Industry')"/>
                <x-select-input id="industry_id" class="block mt-1 w-full" name="industry_id">
                    <option value="">Select Industry</option>
                    @foreach($industries as $industry)
                        <option
                            value="{{$industry->id}}" {{ $company->industry_id == $industry->id ? "selected" : '' }}>{{$industry->name}}</option>
                    @endforeach
                </x-select-input>
                <x-input-error :messages="$errors->get('industry_id')" class="mt-2"/>
            </div>
        </div>



        <div class="grid gap-6 mb-6 md:grid-cols-2">
            <div class="flex flex-col">
                <x-input-label for="status" :value="__('Status')"/>
                <x-select-input id="status" class="block mt-1 w-full" name="status">
                    <option>Select Status</option>
                    <option value="0" {{$company->status  == 1 ? 'selected' : ''}}>Active</option>
                    <option value="1" {{$company->status  == 0 ? 'selected' : ''}}>In Active</option>
                </x-select-input>
                <x-input-error :messages="$errors->get('status')" class="mt-2"/>
            </div>
            <div class="flex flex-col">
                <x-input-label for="state_id" :value="__('State')"/>
                <x-select-input id="state_id" class="block mt-1 w-full" name="state_id" required>
                    <option value="">Select State</option>
                    @foreach($states as $state)
                        <option
                            value="{{$state->id}}" {{ $company->state_id  == $state->id ? "selected" : '' }}>{{$state->name}}</option>
                    @endforeach
                </x-select-input>
                <x-input-error :messages="$errors->get('state_id')" class="mt-2"/>
            </div>
            <div class="flex flex-col">
                <x-input-label for="city" :value="__('City')"/>
                <x-text-input id="city" class="block mt-1 w-full" type="text" name="city" :value="$company->city " required/>
                <x-input-error :messages="$errors->get('city')" class="mt-2"/>
            </div>
        </div>

        <button class="mt-[1%] w-[60px] h-[40px] bg-primary_color rounded-lg text-normal text-natural font-big" type="submit">
            Update
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
