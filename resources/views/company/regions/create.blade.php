@extends('layouts.app')
@section('title', 'Create Region')
@section('page', 'Region Management')
@push('header-links')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
@endpush
@push('header-scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>


@endpush
@section('content')

    <div class="font-big text-big text-natural mb-2 flex flex-row justify-between">
        <div>Add New Region</div>
    </div>

    <form class="mt-[2%] w-[100%]" action="{{route('company.regions.store')}}" method="POST">
        @csrf
        <div class="hidden">
            <input value="1" name="status">
        </div>
        <div class="flex flex-col mb-4 ">
            <x-input-label for="email" :value="__('Email')"/>
            <x-text-input id="email" class="block mt-1 w-full" type="text" name="email" :value="old('email')"
                          required/>
            <x-input-error :messages="$errors->get('email')" class="mt-2"/>
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

        <div class="grid gap-6 mb-6 md:grid-cols-2">
            <div class="flex flex-col">
                <x-input-label for="region_name" :value="__('Region Name')"/>
                <x-text-input id="region_name" class="block mt-1 w-full" type="text" name="region_name"
                              :value="old('region_name')"
                              required/>
                <x-input-error :messages="$errors->get('region_name')" class="mt-2"/>
            </div>
            <div class="flex flex-col">
                <x-input-label for="logout_pin" :value="__('Logout Pin')"/>
                <x-text-input id="logout_pin" class="block mt-1 w-full" type="text" name="logout_pin" required/>
                <x-input-error :messages="$errors->get('logout_pin')" :value="old('logout_pin')" class="mt-2"/>
            </div>
        </div>

        <div class="flex flex-col mb-4 ">
            <x-input-label for="sites" :value="__('Select Sites')"/>
            <x-select-input id="siteSelect" class="block mt-1 w-full" name="sites[]" multiple="multiple">
                <option value="">Select a Site</option>
                @foreach($sites as $item)
                    <option
                        value="{{$item->id}}" {{old('site_id') ==  $item->id ? 'selected' : ''}}>{{$item->name}}</option>
                @endforeach
            </x-select-input>
            <x-input-error :messages="$errors->get('site_id')" class="mt-2"/>
        </div>


        <button class="mt-[1%] w-[60px] h-[40px] bg-primary_color rounded-lg text-normal text-natural font-big"
                type="submit">
            Add
        </button>
    </form>

@endsection
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $('#siteSelect').select2()
        // $('#company_id').on('change', function() {
        //     let companyId = $(this).val();
        //     const currentBaseUrl = window.location.origin;
        //
        //     if (companyId) {
        //         const url = `${currentBaseUrl}/api/company/${companyId}/sites`;
        //         $('#siteSelect').empty();  // Clear previous sites
        //         $('#siteSelect').select2({
        //             ajax: {
        //                 delay: 250,
        //                 url: url,  // Filter sites by company
        //                 dataType: 'json',
        //                 processResults: function(data) {
        //                     const sites = data.data?.sites  ?? []
        //                     return {
        //                         results: sites.map(item => ({
        //                             id: item.id,
        //                             text: item.name
        //                         }))
        //                     };jd
        //                 }
        //             },
        //         });
        //     }
        // });
    </script>
@endpush
