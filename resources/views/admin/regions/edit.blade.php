@extends('layouts.app')
@section('title', 'Edit Region')
@section('page', 'Region Management')
@push('header-links')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
@endpush
@push('header-scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

@endpush
@section('content')

    @include('company.region.change_password_modal', ['name' => $region->name, 'user' => $region->supervisor])
    @include('company.region.change_logout_pin_modal',  ['user' => $region->supervisor, 'name' => $region->name,])


    <div class="font-big text-big text-natural mb-2 flex flex-row justify-between">
        <div>Edit Region ({{$region->name}})</div>

        <button
            class="font-big text-normal text-white rounded-lg border-none bg-red-700 px-[16px] py-[10px] cursor-pointer focus:outline-none text-white"
            id="show_change_password_dialog"
            data-modal-target="changePasswordModal"
            data-modal-toggle="changePasswordModal"
        >
            Change Region Password
        </button>
        <button
            class="font-big text-normal text-white rounded-lg px-[16px] py-[10px] cursor-pointer bg-yellow-500"
            data-modal-target="changeLogoutModal"
            data-modal-toggle="changeLogoutModal"
        >
            Change Region Logout Pin
        </button>
        <a
            class="font-big text-normal text-primary_color rounded-lg border border-primary_color px-[16px] py-[10px] cursor-pointer bg-transparent"
            href="{{route('admin.regions.index')}}"
        >
            Manage Regions
        </a>
    </div>

    <form class="mt-[2%] w-[100%]" action="{{route('admin.regions.update', ['region' => $region])}}" method="POST">
        @csrf
        @method('PATCH')

        <div class="grid gap-6 mb-6 md:grid-cols-2">
            <div class="flex flex-col">
                <x-input-label for="email" :value="__('Email')"/>
                <x-text-input id="email" class="block mt-1 w-full" type="text" name="email"
                              :value="$region->supervisor->email"
                              required/>
                <x-input-error :messages="$errors->get('email')" class="mt-2"/>
            </div>
            <div class="flex flex-col">
                <x-input-label for="status" :value="__('Status')"/>
                <x-select-input id="status" class="block mt-1 w-full" name="status">
                    <option>Select Status</option>
                    <option value="1" {{$region->status  == 1 ? 'selected' : ''}}>Active</option>
                    <option value="0" {{$region->status  == 0 ? 'selected' : ''}}>In Active</option>
                </x-select-input>
                <x-input-error :messages="$errors->get('status')" class="mt-2"/>
            </div>
        </div>

        <div class="grid gap-6 mb-6 md:grid-cols-2">
            <div class="flex flex-col">
                <x-input-label for="region_name" :value="__('Region Name')"/>
                <x-text-input id="region_name" class="block mt-1 w-full" type="text" name="region_name"
                              :value="$region->name"
                              required/>
                <x-input-error :messages="$errors->get('region_name')" class="mt-2"/>
            </div>
            <div class="flex flex-col">
                <x-input-label for="company_id" :value="__('Select Company')"/>
                <x-select-input id="company_id" class="block mt-1 w-full" name="company_id">
                    <option>Select Company</option>
                    @foreach($companies as $company)

                        <option
                            value="{{$company->id}}" {{$region->company->id ==  $company->id ? 'selected' : ''}}>{{$company->name}}</option>
                    @endforeach
                </x-select-input>
                <x-input-error :messages="$errors->get('company_id')" class="mt-2"/>
            </div>
        </div>

        <div class="flex flex-col mb-4 ">
            <x-input-label for="sites" :value="__('Select Sites')"/>
            <x-select-input id="siteSelect" class="block mt-1 w-full" name="sites[]" multiple="multiple">
                <option value="">Select a Site</option>
            </x-select-input>
            <x-input-error :messages="$errors->get('company_id')" class="mt-2"/>
        </div>

        <button class="mt-[1%] w-[60px] h-[40px] bg-primary_color rounded-lg text-normal text-natural font-big"
                type="submit">
            Update
        </button>
    </form>

@endsection
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>


        $('#company_id').on('change', function () {
            let companyId = $(this).val();
            const currentBaseUrl = window.location.origin;
            if (companyId) {
                const url = `${currentBaseUrl}/api/company/${companyId}/sites`;
                $('#siteSelect').empty();  // Clear previous sites
                $('#siteSelect').select2({
                    ajax: {
                        delay: 250,
                        url: url,  // Filter sites by company
                        dataType: 'json',
                        processResults: function (data) {
                            const sites = data.data?.sites ?? []
                            return {
                                results: sites.map(item => ({
                                    id: item.id,
                                    text: item.name
                                }))
                            };
                            jd
                        }
                    },
                    multiple: true,
                });
            }
        });

        const companyDropdown = document.querySelector('#company_id');
        const companyId = companyDropdown.value


        if (companyId) {
            let selectedSites = @json($selectedSites);
            $('#siteSelect').select2({
                multiple: true
            });
            const siteSelect = $('#siteSelect');
            const currentBaseUrl = window.location.origin;
            const url = `${currentBaseUrl}/api/company/${companyId}/sites`;
            $.ajax({
                type: 'GET',
                url: url
            }).then(function (data) {
                console.log(data)
                const sites = data.data?.sites ?? []
                let options = [];
                sites.forEach(site => {
                    console.log(site)
                    if (selectedSites.includes(site.id)) {
                        options.push(new Option(site.name, site.id, true, true));
                    }
                });
                siteSelect.append(options).trigger('change');
                siteSelect.trigger({
                    type: 'select2:select',
                    params: {
                        data: sites
                    }
                });
            });
        }


    </script>
@endpush
