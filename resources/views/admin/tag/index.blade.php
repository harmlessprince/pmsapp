@extends('layouts.app')
@section('title', 'Tags')
@section('page', 'Tag Management')
@push('header-scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
@endpush
@section('content')

    <section>
        <section class="flex flex-row justify-between w-[100%] max-lg:mt-[15%]">
            <div
                class="flex flex-row  bg-background_color rounded-lg h-[111px] w-[290px] items-center px-[20px] max-lg:mx-auto">
                <div class="w-[44px] h-[44px] bg-tags rounded-lg flex flex-row items-center justify-center">
                    <span class="material-symbols-outlined text-white">sell</span>
                </div>
                <div class="ml-[5%]">
                    <h1 class="font-bold text-3xl text-tags">{{$tagCount}}</h1>
                    <span class="font-normal text-sm text-tags">Tags</span>
                </div>
            </div>
        </section>

        <!-- table section -->
        <section class="pt-basic_padding">
            <!-- add tag -->
            <div class="font-big text-big text-natural mb-2 flex flex-row justify-between">
                <div>Added Tags</div>
                <div
                    class="rounded-lg border border-primary_color flex flex-row items-center px-[16px] py-[10px] cursor-pointer">
                    <img src="{{asset('assets/images/plus.png')}}" class="w-[11px] h-[11px]" alt="plus"/>
                    <a href="{{route('admin.tags.create')}}">
                        <span class="text-primary_color font-big text-normal ml-2"> Add New Tag</span>
                    </a>
                </div>
            </div>

            <section>
                <x-filter-card :actionUrl="route('admin.tags.index')" :hasTable="false" :canSearch="true"
                               :searchPlaceholder="'Search by tag name, code, comment'">
                    <div class="flex flex-col">
                        <x-input-label for="company_id" :value="__('Select Company')"/>
                        <x-select-input id="company_id" class="block mt-1 w-full" name="company_id">
                            <option value="">Select Company</option>
                            @foreach($companies as $company)
                                <option
                                    value="{{$company->id}}" {{ request()->query('company_id') == $company->id ? "selected" : '' }}>{{$company->name}}</option>
                            @endforeach
                        </x-select-input>
                    </div>

                    <div class="flex flex-col">
                        <div class="flex flex-row items-center h-6">
                        <x-input-label for="site_id" :value="__('Site')" class="text-white"/>
                        <x-loader/>
                        </div>
                        <x-select-input id="site_id" class="block w-full" name="site_id">
                            <option class="" value="">All site</option>
                        </x-select-input>
                    </div>

                </x-filter-card>
            </section>

            <!-- table 2 section -->
            <section class="border border-table rounded-lg w-[100%] mt-[2%] bg-background_color">
                <div class="overflow-x-auto">
                    <table class="table-fixed w-[100%] max-lg:w-[1000px]">
                        <thead class="">
                        <tr class="text-left text-small text-natural font-big">
                            <th class="px-smaller py-[1%] w-[10%]">Tag</th>
                            <th class="px-smaller py-[1%] w-[17%]">Code</th>
                            <th class=" px-smaller py-[1%] w-[15%]">Company</th>
                            <th class="px-smaller py-[1%] w-[13%]">Site</th>
                            <th class="px-smaller py-[1%] w-[10%]">Type</th>
                            <th class="px-smaller py-[1%] w-[25%]">Comments</th>
                            <th class="px-smaller py-[1%] w-[5%] text-right">Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @forelse($tags as $tag)
                            <tr class="text-normal font-normal border border-table border-x-0 border-b-0 text-natural hover:bg-db">
                                <td class="px-smaller py-small">
                                    {{$tag->name}}
                                </td>
                                <td class="px-smaller py-small">{{$tag->code}}</td>
                                <td class="px-smaller py-small">{{$tag->company->display_name}}</td>
                                <td class=" px-smaller py-small">{{$tag->site->name}}</td>
                                <td class="px-smaller py-small">QR Code</td>
                                <td class="px-smaller truncate py-small">{{$tag->comment}}</td>
                                <td class="px-smaller text-right">
                                    <div class="flex flex-row justify-center">
                                        <a href="{{route('admin.tags.edit', ['tag' => $tag->id])}}">

                                                <span
                                                    class="material-symbols-outlined w-[16px] h-[16px] ml-3 cursor-pointer text-natural">edit_square</span>
                                        </a>

                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr class="text-normal font-normal border border-table border-collapse text-natural hover:bg-db">
                                <td class="text-center" colspan="5">No Data</td>
                            </tr>
                        @endforelse

                        </tbody>
                    </table>
                </div>
                {{ $tags->links() }}
            </section>
        </section>
    </section>
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
