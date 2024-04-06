@extends('layouts.app')
@section('title', 'Transactions')
@section('page')
    <h2>Scan Transactions</h2>
@endsection
@push('header-links')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>

@endpush
@push('header-scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/datepicker.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endpush
@section('content')

    <!-- Dashboard content -->
    <section class="">
        <!-- filter searches -->
        <x-filter-card :actionUrl="route('company.scans.transactions')" :canExport="true">
            <input value="yes" name="date" hidden/>


            <div class="flex flex-col">
                <div class="relative">
                    <x-input-label for="scan_date_from_date" :value="__('Start date')"/>
                    <div class="absolute bottom-[20%] start-0 flex items-center ps-3.5 pointer-events-none">
                        <svg class="w-4 h-4 text-natural dark:text-gray-400" aria-hidden="true"
                             xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                        </svg>
                    </div>
                    <x-text-input
                        id="name"
                        class="block w-full pl-[20%]"
                        type="text"
                        datepicker
                        datepicker-autohide
                        datepicker-format="dd-mm-yyyy"
                        type="text"
                        placeholder="Select start date"
                        name="scan_date_from_date"
                        :value="request()->query('scan_date_from_date')"
                    />
                </div>
            </div>
            <div class="flex flex-col">
                <div class="relative">
                    <x-input-label for="scan_date_to_date" :value="__('End date')"/>
                    <div class="absolute bottom-[20%] start-0 flex items-center ps-3.5 pointer-events-none">
                        <svg class="w-4 h-4 text-natural dark:text-gray-400" aria-hidden="true"
                             xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                        </svg>
                    </div>
                    <x-text-input
                        id="scan_date_to_date"
                        class="block w-full pl-[20%]"
                        type="text"
                        datepicker
                        datepicker-autohide
                        datepicker-format="dd-mm-yyyy"
                        type="text"
                        placeholder="Select start date"
                        name="scan_date_to_date"
                        :value="request()->query('scan_date_to_date')"
                    />
                </div>
            </div>

            <div class="flex flex-col">
                <x-input-label for="site_id" :value="__('Site')" class="text-white"/>
                <x-select-input id="site_id" class="block w-full" name="site_id">
                    <option class="" value="">All site</option>
                    @foreach($sites as $site)
                        <option
                            value="{{$site->id}}" {{ request()->query('site_id') == $site->id ? "selected" : '' }}>{{$site->name}}</option>
                    @endforeach
                </x-select-input>
            </div>
            <div class="flex flex-col">
                <x-input-label for="tag_id" :value="__('Tag')" class="text-white"/>
                <x-select-input id="tag_id" class="block w-full" name="tag_id">
                    <option class="" value="">Select a tag</option>
                </x-select-input>
            </div>
        </x-filter-card>


        <!-- table -->
        <section class="border border-table mt-[2%] rounded-lg">
            <div class="overflow-x-auto">
                <table class="table-fixed w-[100%] max-lg:w-[1000px] bg-background_color">
                    <thead>
                    <tr class="overflow-x-auto">
                        <th class="text-left text-small text-natural font-big  px-smaller py-smaller w-[10%]">Scan Date/Time</th>
                        {{--                        <th class="text-left text-small text-natural font-big  px-small py-smaller">Scan Time</th>--}}
                        <th class="text-left text-small text-natural font-big px-smaller py-smaller w-[10%]">Tag</th>
                        <th class="text-left text-small text-natural font-big px-smaller py-smaller w-[10%]">Site</th>
                        <th class="text-left text-small text-natural font-big px-smaller py-smaller w-[10%]">Longitude</th>
                        <th class="text-left text-small text-natural font-big px-smaller py-smaller w-[10%]">Latitude</th>
                        <th class="text-left text-small text-natural font-big px-smaller py-smaller w-[8%]">Distance</th>
                        <th class="text-left text-small text-natural font-big px-smaller py-smaller w-[20%]">Proximity</th>
                        <th class="text-left text-small text-natural font-big px-smaller py-smaller w-[7%]">Round</th>
                        <th class="text-left text-small text-natural font-big px-smaller py-smaller w-[7%]">Gap</th>
                    </tr>
                    </thead>
                    <tbody>

                    @forelse($scans as $scan)
                        <tr class="border border-table border-x-0 text-natural hover:bg-db">
                            <td class="text-normal font-normal px-smaller">
                                <div>{{$scan->scan_date->format('d/m/Y')}}</div>
                                <div>{{Carbon\Carbon::parse($scan->scan_time)->format('g:i A')}}</div>
                            </td>
                            {{--                            <td class="text-normal font-normal px-small">--}}
                            {{--                                <div>{{Carbon\Carbon::parse($scan->scan_time)->format('g:i A')}}</div>--}}
                            {{--                            </td>--}}
                            <td class="text-normal font-normal px-smaller">{{$scan->tag->name}}</td>
                            <td class="text-normal font-normal px-smaller">{{$scan->site->name}}</td>
                            <td class="text-normal font-normal p-smaller">{{$scan->longitude ?? '-'}}</td>
                            <td class="text-normal font-normal px-smaller">{{$scan->latitude ?? '-'}}</td>
                            <td class="text-normal font-normal px-smaller">{{round($scan->distance)}} km</td>
                            <td class="text-normal font-normal px-smaller">{{$scan->proximity}}</td>
                            <td class="text-normal font-normal px-smaller">{{$scan->round}}</td>
                            <td class="text-normal font-normal px-smaller">{{secondsToHoursMinutes($scan->gap_duration)}}</td>
                            {{--                            <td class="text-normal font-normal px-small">00h00</td>--}}
                        </tr>
                    @empty
                        <tr class="border border-table border-x-0 text-natural hover:bg-db">
                            <td colspan="7" class="text-center">No Data</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
            {{ $scans->links() }}
        </section>
    </section>

@endsection

@push('scripts')
    <script>

        const selectSite = document.getElementById("site_id");
        const selectTag = document.getElementById("tag_id");

        $(document).ready(function () {
            $('.select-2-sites').select2({
                placeholder: "Select a site",
                allowClear: true
            });
            selectTag.disabled = true;
            const siteParamValue = getQueryParamValue('site_id');
            if (siteParamValue != null) {
                getSiteTags(siteParamValue)
            }

        });

        selectSite.addEventListener("change", function (e) {
            getSiteTags(e.target.value)
        });

        function resetForm() {
            $(".select-2-sites").val('').trigger('change')
            document.getElementById("search-form").reset();
            window.location.replace(location.pathname);
        }
    </script>
@endpush
