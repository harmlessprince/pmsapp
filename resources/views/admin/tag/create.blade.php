@extends('layouts.app')
@section('title', 'create tag')
@section('page', 'Tag Management')
@push('header-scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
@endpush
@section('content')

    <div class="font-big text-big text-natural mb-2 flex flex-row justify-between">
        <div>Add New Tag</div>
        <a
            class="font-big text-normal text-primary_color rounded-lg border border-primary_color px-[16px] py-[10px] cursor-pointer bg-transparent"
            href="{{route('admin.tags.index')}}"
        >
            Manage Tags
        </a>
    </div>
    <form class="mt-[2%] w-[100%]" action="{{route('admin.tags.store')}}" method="post">
        @csrf
        <div class="grid gap-6 mb-6 md:grid-cols-2">
            <div class="flex flex-col">
                <x-input-label for="company_id" :value="__('Select Company')"/>
                <x-select-input id="company_id" class="block mt-1 w-full" name="company_id">
                    <option>Select Company</option>
                    @foreach($companies as $company)
                        <option
                            value="{{$company->id}}" {{old('company_id') ==  $company->id ? 'selected' : ''}}>{{$company->name}}</option>
                    @endforeach
                </x-select-input>
                <x-input-error :messages="$errors->get('select_company')" class="mt-2"/>
            </div>
            <div class="flex flex-col">
                <div class="flex flex-row items-center h-6">
                <x-input-label for="site_id" :value="__('Site')" class="text-white"/>
                <x-loader/>
                </div>
                <x-select-input id="site_id" class="block w-full" name="site">
                    <option class="" value="">Select a site</option>
                </x-select-input>
            </div>

        </div>

        <div class="grid gap-6 mb-6 md:grid-cols-2">
            <div class="flex flex-col">
                <x-input-label for="name" :value="__('Tag Name')"/>
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="tag_name" :value="old('tag_name')"
                              required/>
                <x-input-error :messages="$errors->get('tag_name')" class="mt-2"/>
            </div>
            <div class="flex flex-col">

                <x-input-label for="tag_type" :value="__('Tag type')"/>
                <x-select-input id="tag_type" class="block mt-1 w-full" name="tag_type">
                    <option value="qr">QR</option>
                </x-select-input>
                <x-input-error :messages="$errors->get('tag_type')" class="mt-2"/>
            </div>
        </div>


        <div class="w-full  mb-2">
            <x-input-label for="comment" :value="__('Comment')"/>
            <x-text-area-input for="comment" name='comment' :value="old('comment')"/>
            <x-input-error :messages="$errors->get('comment')" class="mt-2"/>
        </div>


        <div class="w-full mb-2">
            <x-input-label for="location" :value="__('Search Location')"/>
            <x-text-input id="location" class="block mt-1 w-full" type="text" name="location" :value="old('location')"/>
            <x-input-error :messages="$errors->get('name')" class="mt-2"/>
        </div>
        <div class="grid gap-6 mb-6 md:grid-cols-2">
            <div class="flex flex-col">
                <x-input-label for="longitude" :value="__('Longitude')"/>
                <x-text-input id="longitude" class="block mt-1 w-full" type="number" name="longitude" readonly/>
                <x-input-error :messages="$errors->get('longitude')" class="mt-2"/>
            </div>
            <div class="flex flex-col">
                <x-input-label for="latitude" :value="__('Latitude')"/>
                <x-text-input id="latitude" class="block mt-1 w-full" type="number" name="latitude" readonly/>
                <x-input-error :messages="$errors->get('latitude')" class="mt-2"/>
            </div>
        </div>
        <button class="mt-[1%] w-[60px] h-[40px] bg-primary_color rounded-lg text-normal text-natural font-big"
                type="submit">Add
        </button>
    </form>

@endsection

@push('scripts')
    <script>
        const filterDropdown = document.querySelector("#filter");
        const selectSite = document.getElementById("site_id");
        const selectCompany = document.getElementById("company_id");
        $(document).ready(function () {

            selectSite.disabled = true;
            const companyParamValue = getQueryParamValue('company_id');
            console.log(companyParamValue)
            if (companyParamValue != null) {
                getCompanySites(companyParamValue)
            }

        });

        selectCompany.addEventListener("change", function (e) {
            getCompanySites(e.target.value)
        });


        function resetForm() {
            $(".site").val('').trigger('change')
            document.getElementById("search-form").reset();
            window.location.replace(location.pathname);
        }
    </script>
@endpush
