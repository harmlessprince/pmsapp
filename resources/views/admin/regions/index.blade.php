@php
    $isSuperAdmin = \Illuminate\Support\Facades\Auth::user()->hasRole(\App\Enums\RoleEnum::SUPER_ADMIN->value);
@endphp
@extends('layouts.app')
@section('title', 'Region')
@section('page', 'Region Management')
@section('content')

    <section>
        <section class="flex flex-row justify-start w-[100%] max-lg:mt-[3em]">
            <div
                class="flex flex-row bg-background_color rounded-lg h-[111px] w-[290px] max-small:w-full items-center px-[20px]">
                <div class="w-[44px] h-[44px] bg-guards rounded-lg flex flex-row items-center justify-center">
                    <span class="material-symbols-outlined text-white">person</span>
                </div>
                <div class="ml-[5%]">
                    <h1 class="font-bold text-3xl text-guards">{{$regionsCount}}</h1>
                    <span class="font-normal text-sm text-guards">Total Regions</span>
                </div>
            </div>
        </section>

        <!-- table section -->
        <section class="pt-basic_padding">
            <!-- add user -->
            <div class="font-big text-big text-natural mb-2 flex flex-row justify-between">
                <div>Added Regions</div>
                @if($isSuperAdmin)
                    <div
                        class="rounded-lg border border-primary_color flex flex-row items-center px-[16px] py-[10px] cursor-pointer">
                        {{-- <img src="{{asset('assets/images/plus.png')}}" class="w-[11px] h-[11px]" alt="plus"/> --}}
                        <span class="material-symbols-outlined text-primary_color">add</span>
                        <a href="{{route('admin.regions.create')}}">
                            <span class="text-primary_color font-big text-normal ml-2"> Add Region</span>
                        </a>
                    </div>
                @endif
            </div>
            <x-filter-card :actionUrl="route('admin.regions.index')" :canSearch="true"
                           :searchPlaceholder="'Search by name'">
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
                        <option class="" value="">Select a site</option>
                    </x-select-input>
                </div>
            </x-filter-card>


            <!-- table 2 section -->
            <section class="border border-table rounded-lg w-[100%] mt-[2%] bg-background_color">
                <div class="overflow-x-auto">
                    <table class="table-auto w-[100%] max-lg:w-[1000px]">
                        <thead class="">
                        <tr class="text-left text-small text-natural font-big">
                            <th class=" px-small py-[1%]">Name</th>
                            <th class=" px-small py-[1%]">Email</th>
                            <th class=" px-small py-[1%]">Company</th>
                            <th class=" px-small py-[1%]">No Of Sites</th>
                            <th class="px-small py-[1%]">Status</th>
                            <th class="px-small py-[1%]">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($regions as $region)
                            <tr class="text-normal font-normal border border-table border-x-0 border-b-0 text-natural hover:bg-db">


                                <td class="px-smaller py-small">

                                    {{$region->name ?? ''}}
                                </td>
                                <td class="px-smaller py-small">
                                    {{$region->supervisor->email ?? ''}}
                                </td>
                                <td class="px-small">
                                    {{$region->company->name ?? 'N/A'}}
                                </td>
                                <td class="px-small">
                                    {{$region->sites_count }}
                                </td>
                                <td class="px-smaller">
                                    @if((bool)$region->status)
                                        <button
                                            class="bg-foundation W-[78px] h-[22px] px-[8px] py-[2px] rounded-full flex flex-row items-center justify-between">
                                            <img src="{{asset('assets/images/white_dot.png')}}" alt="dashboard"
                                                 class="mr-2"/>
                                            <span class="text-natural font-big text-small">Active</span>
                                        </button>
                                    @else
                                        <button
                                            class="bg-inactive W-[78px] h-[22px] px-[8px] py-[2px] rounded-full flex flex-row items-center justify-between">
                                            <img src="{{asset('assets/images/white_dot.png')}}" alt="dashboard"
                                                 class="mr-2"/>
                                            <span class="text-natural font-big text-small">Inactive</span>
                                        </button>
                                    @endif
                                </td>
                                <td class="px-small text-center">
                                    @if($isSuperAdmin)
                                        <div class="flex flex-row justify-between gap-1">
                                            <a href="{{route('admin.regions.edit', ['region' => $region->id])}}">

                                                <span
                                                    class="material-symbols-outlined w-[16px] h-[16px] ml-3 cursor-pointer text-natural">edit_square</span>
                                            </a>

                                            <a href=""
                                               onclick='deleteItem(event, {{"$region->id"}}, "Are you sure you want to delete this region, all related scans, attendances, tags, personnel&#39;s will be deleted as well")' class="flex">
                                            <span
                                                class="material-symbols-outlined mr-4 w-[24px] h-[24px] text-red-500 cursor-pointer">delete</span>
                                            </a>
                                            <form id="frm-delete-item-{{$region->id}}"
                                                  action="{{ route('admin.regions.destroy', ['region' => $region]) }}"
                                                  style="display: none;" method="POST">
                                                @csrf
                                                @method('delete')

                                            </form>

                                        </div>
                                    @else
                                        -
                                    @endif
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
                {{ $regions->links() }}
            </section>
        </section>
    </section>
@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        const selectSite = document.getElementById("site_id");
        const selectCompany = document.getElementById("company_id");
        $(document).ready(function () {
            // $('.select-2-sites').select2({
            //     placeholder: "Select a site",
            //     allowClear: true
            // });
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
            $(".select-2-sites").val('').trigger('change')
            document.getElementById("search-form").reset();
            window.location.replace(location.pathname);
        }

    </script>
@endpush

