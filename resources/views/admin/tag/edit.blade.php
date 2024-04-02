@extends('layouts.app')
@section('title', 'create tag')
@section('page', 'Tag Management')
@push('header-scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
@endpush
@section('content')

    <div class="font-big text-big text-natural mb-2 flex flex-row justify-between">
        <div>Update Tag</div>
        <button
            class="font-big text-normal text-primary_color rounded-lg border border-primary_color px-[16px] py-[10px] cursor-pointer bg-transparent">
            Manage Tags
        </button>
    </div>
    <form class="mt-[2%] w-[100%]" action="{{route('admin.tags.update', ['tag' => $tag])}}" method="post">
        @csrf
        @method('patch')
        <div class="grid gap-6 mb-6 md:grid-cols-2">
            <div class="flex flex-col">
                <x-input-label for="company_id" :value="__('Select Company')"/>
                <x-select-input id="company_id" class="block mt-1 w-full" name="company_id">
                    <option>Select Company</option>
                    @foreach($companies as $company)
                        <option
                            value="{{$company->id}}" {{$tag->company_id ==  $company->id ? 'selected' : ''}}>{{$company->name}}</option>
                    @endforeach
                </x-select-input>
                <x-input-error :messages="$errors->get('company_id')" class="mt-2"/>
            </div>
            <div class="flex flex-col">
                <div class="flex flex-row items-center h-6">
                    <x-input-label for="site_id" :value="__('Site')" class="text-white"/>
                    <x-loader/>
                    </div>
                <x-select-input id="site_id" class="block w-full" name="site">
                    <option class="" value="">Select a site</option>
                </x-select-input>
                <x-input-error :messages="$errors->get('site')" class="mt-2"/>
            </div>

        </div>

        <div class="grid gap-6 mb-6 md:grid-cols-2">
            <div class="flex flex-col">
                <x-input-label for="name" :value="__('Tag Name')"/>
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="tag_name" :value="$tag->name"
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
            <x-text-area-input for="comment" name='comment' :value="$tag->comment"/>
            <x-input-error :messages="$errors->get('comment')" class="mt-2"/>
        </div>


        <div class="w-full mb-2">
            <x-input-label for="location" :value="__('Search Location')"/>
            <x-text-input id="location" class="block mt-1 w-full" type="text" name="location" :value="old('location')"/>
            <x-input-error :messages="$errors->get('location')" class="mt-2"/>
        </div>
        <div class="grid gap-6 mb-6 md:grid-cols-2">
            <div class="flex flex-col">
                <x-input-label for="longitude" :value="__('Longitude')"/>
                <x-text-input id="longitude" class="block mt-1 w-full" type="text" step="0.01" name="longitude"  :value="$tag->longitude" readonly/>
                <x-input-error :messages="$errors->get('longitude')" class="mt-2"/>
            </div>
            <div class="flex flex-col">
                <x-input-label for="latitude" :value="__('Latitude')"/>
                <x-text-input id="latitude" class="block mt-1 w-full" type="text" name="latitude"  :value="$tag->latitude" readonly/>
                <x-input-error :messages="$errors->get('latitude')" class="mt-2"/>
            </div>
        </div>
        <div class="w-full mb-2">
            <div id="searchLocationMap" style="height: 400px; width: 100%;"></div>
        </div>
        <button class="mt-[1%] w-[60px] h-[40px] bg-primary_color rounded-lg text-normal text-natural font-big"
                type="submit">Update
        </button>
    </form>

@endsection

@push('scripts')
    <script>
        const filterDropdown = document.querySelector("#filter");
        const selectSite = document.getElementById("site_id");
        const selectCompany = document.getElementById("company_id");
        $(document).ready(function () {
            // selectSite.disabled = true;
            const companySelectValue = selectCompany.value;
            const tag =  @json($tag);
            if (companySelectValue != null) {
                getCompanySites(companySelectValue, tag.site_id ?? null)
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
