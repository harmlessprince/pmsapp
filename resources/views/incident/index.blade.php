@php
    $isAdmin =  auth()->user()->hasAnyRole(['super_admin', 'admin']);

@endphp
@extends('layouts.app')
@section('title', 'Incident')
@section('page')
    <h2>Incident Reports</h2>
@endsection
@push('header-links')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>

@endpush
@push('header-scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/datepicker.min.js"></script>
@endpush
@section('content')

    <!-- Dashboard content -->
    @include('image-view-modal')
    <section class="">
        <x-filter-card :actionUrl="route('incidents.index')" :canSearch="true"
                       :searchPlaceholder="'Search by name'" :canExport="true" :canDelete="$isAdmin">
            <input value="yes" name="date" hidden/>
            <div class="flex flex-col">
                <div class="relative">
                    <x-input-label for="created_at_from_date" :value="__('Start date')"/>
                    <div class="absolute bottom-[20%] start-0 flex items-center ps-3.5 pointer-events-none">
                        <svg class="w-4 h-4 text-natural dark:text-gray-400" aria-hidden="true"
                             xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                        </svg>
                    </div>
                    <x-text-input
                        id="created_at_from_date"
                        class="block w-full pl-[20%]"
                        type="text"
                        datepicker
                        datepicker-autohide
                        datepicker-format="dd-mm-yyyy"
                        type="text"
                        placeholder="Select start date"
                        name="created_at_from_date"
                        :value="request()->query('created_at_from_date')"
                    />
                </div>
            </div>
            <div class="flex flex-col">
                <div class="relative">
                    <x-input-label for="created_at_to_date" :value="__('End date')"/>
                    <div class="absolute bottom-[20%] start-0 flex items-center ps-3.5 pointer-events-none">
                        <svg class="w-4 h-4 text-natural dark:text-gray-400" aria-hidden="true"
                             xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                        </svg>
                    </div>
                    <x-text-input
                        id="created_at_to_date"
                        class="block w-full pl-[20%]"
                        type="text"
                        datepicker
                        datepicker-autohide
                        datepicker-format="dd-mm-yyyy"
                        type="text"
                        placeholder="Select end date"
                        name="created_at_to_date"
                        :value="request()->query('created_at_to_date')"
                    />
                </div>
            </div>

            @if($isAdmin)
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
            @else
                <div class="flex flex-col">
                    <x-input-label for="site_id" :value="__('Site')" class="text-white"/>
                    <x-select-input id="site_ids" class="block w-full" name="site_id">
                        <option class="" value="">All site</option>
                        @foreach($sites as $item)
                            <option
                                value="{{$item->id}}" {{ request()->query('site_id') == $item->id ? "selected" : '' }}>{{$item->name}}</option>
                        @endforeach
                    </x-select-input>
                </div>
            @endif

            <div class="flex flex-col">
                <x-input-label for="type" :value="__('Type')"/>
                <x-select-input id="type" class="block mt-1 w-full"
                                name="type">
                    <option value="">Select Type</option>
                    <option
                        value="storage" {{ request()->query('type') == 'storage' ? "selected" : '' }}>
                        Storage Purpose
                    </option>
                    <option
                        value="rapid" {{ request()->query('type') == 'rapid' ? "selected" : '' }}>
                        Rapid Response
                    </option>
                </x-select-input>
            </div>

        </x-filter-card>

        <!-- table -->
        <section class="border border-table mt-[2%] rounded-lg">
            <div class="overflow-x-auto">
                <table class="table-auto w-[100%] max-lg:w-[1000px] bg-background_color">
                    <thead>
                    <tr class="">
                        <th class="text-left text-small text-natural font-big  px-smaller py-smaller w-[12%]">
                            Name
                        </th>
                        <th class="text-left text-small text-natural font-big  px-smaller py-smaller w-[9%]">
                            Time/Date
                        </th>
                        <th class="text-left text-small text-natural font-big  px-smaller py-smaller w-[12%]">
                            Type
                        </th>
                        <th class="text-left text-small text-natural font-big px-smaller py-smaller w-[9%]">Site</th>
                        {{--                        <th class="text-left text-small text-natural font-big px-smaller py-smaller w-[9%]">Distance</th>--}}
                        <th class="text-left text-small text-natural font-big px-smaller py-smaller w-[8%]">Image</th>
                        <th class="text-left text-small text-natural font-big px-smaller py-smaller w-[12%]">Comment
                        </th>
                        @if($isAdmin)
                            <th class="text-left text-small text-natural font-big px-smaller py-smaller w-[12%]">Action
                            </th>
                        @endif
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($incidents as $item)
                        <tr class="border border-table border-x-0 text-natural hover:bg-db">
                            <td class="text-normal font-normal px-smaller">{{$item->reportedBy->first_name ?? 'N/A'}} {{$item->reportedBy->last_name ?? ''}}</td>
                            <td class="text-normal font-normal px-smaller">
                                <div>{{$item->created_at->format('d/m/Y')}}</div>
                                <div>{{Carbon\Carbon::parse($item->created_at)->format('g:i A')}}</div>
                            </td>
                            <td class="text-normal font-normal px-smaller">
                                @if($item->type == 'storage')
                                    <button
                                        class="bg-checkin  px-2 py-1 me-2 rounded-full flex flex-row items-center justify-between">
                                        <span class="text-checkInText font-bold text-small">Storage Purpose</span>
                                    </button>
                                @endif
                                @if($item->type == 'rapid')
                                    <button
                                        class="bg-red-200  px-2 py-1 me-2 rounded-full flex flex-row items-center justify-between">
                                        <span class="text-red-500 text-small font-bold">Rapid Response</span>
                                    </button>
                                @endif
                            </td>
                            <td class="text-normal font-normal px-smaller">{{$item->site->name ?? ''}}</td>

                            <td class="text-normal font-normal px-small">
                                <img src="{{ $item->image ?? asset('assets/images/tableImg.png')}}"
                                     alt="dashboard"
                                     class=" w-[60px] h-[60px]"
                                     data-modal-target="imageViewModalElement"
                                     data-modal-toggle="imageViewModalElement"
                                     onclick='showImageModal("{{$item->image}}", "{{$item->comment}}")'
                                />
                            </td>
                            <td class="text-normal font-normal px-smaller">{{$item->comment ?? 'n/a'}}</td>

                            @if($isAdmin)
                                <td class="px-smaller">
                                    <form id="frm-delete-item-{{$item->id}}"
                                          action="{{ route('incidents.destroy', ['incident' => $item]) }}"
                                          style="display: none;" method="POST">
                                        @csrf
                                        @method('delete')

                                    </form>
                                    <a href=""
                                       onclick='deleteItem(event, {{"$item->id"}})' title="Delete an incident report">
                                            <span
                                                class="material-symbols-outlined mr-4 w-[24px] h-[24px] text-red-500 cursor-pointer">delete</span>
                                    </a>
                                </td>
                            @endif

                        </tr>
                    @empty

                        <tr class="text-normal font-normal border border-table border-collapse text-natural hover:bg-db">
                            <td class="text-center" colspan="7">No Data</td>
                        </tr>

                    @endforelse
                    </tbody>
                </table>
            </div>
            {{ $incidents->links() }}
        </section>
    </section>
@endsection
@push('scripts')
    <script>
        const selectSite = document.getElementById("site_id");
        const selectCompany = document.getElementById("company_id");
        $(document).ready(function () {
            // $('.select-2-sites').select2({
            //     placeholder: "Select a site",
            //     allowClear: true
            // });
            if (selectSite) selectSite.disabled = true;
            const companyParamValue = getQueryParamValue('company_id');
            if (companyParamValue != null) {
                getCompanySites(companyParamValue)
            }

        });
        if (selectCompany) {
            selectCompany.addEventListener("change", function (e) {
                getCompanySites(e.target.value)
            });
        }


        function resetForm() {
            $(".select-2-sites").val('').trigger('change')
            document.getElementById("search-form").reset();
            window.location.replace(location.pathname);
        }

    </script>
@endpush
