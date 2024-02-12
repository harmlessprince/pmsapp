@extends('layouts.app')
@section('title', 'Transactions')
@section('page')
    <h2>Scan Transactions</h2>
@endsection
@push('header-links')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
    <style>
        .select2-container--default .select2-selection--single {
            padding-top: 0.25rem;
            padding-bottom: 0.25rem;
            height: 2.75rem;
            width: 100%;
            position: relative;
            cursor: pointer;
            background-color: transparent;
            border-radius: 0.5rem;
            border-width: 1px;

            color: rgb(254 255 254 / var(--tw-text-opacity));
            font-size: 14px;
            --tw-border-opacity: 1;
            border-color: rgb(254 255 254 / var(--tw-border-opacity));
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            --tw-text-opacity: 1;
            color: rgb(254 255 254 / var(--tw-text-opacity));
        }

    </style>
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
        <form method="GET" action="{{route('scans.transactions')}}" id="search-form">

            <div class="flex flex-row justify-between items-center max-lg:flex-col">
                <div class="w-[75%] flex flex-row justify-between max-lg:w-[100%] max-lg:flex-col">
                    <div class="w-[15%] max-lg:w-[100%]">
                        <label class="font-big text-normal text-natural">No Of Rows</label>
                        <label>
                            <select
                                class="cursor-pointer w-full border border-natural bg-db h-[44px] px-2 py-1 rounded-lg text-normal font-normal text-natural"
                                name="per_page"
                            >
                                <option class="" value="15" {{ request()->query('per_page') == 15 ? "selected" : '' }}> 15 rows</option>
                                @for ($i = 10; $i <= 50; $i += 10)
                                    <option class="" value="{{$i}}"  {{ request()->query('per_page') == $i ? "selected" : '' }}> {{$i}} rows</option>
                                @endfor

                            </select>
                        </label>
                    </div>
                    <div class="relative w-[19%] max-lg:w-[100%]">
                        <label class="font-big text-normal text-natural">Start date</label>
                        <div class="absolute bottom-[20%] start-0 flex items-center ps-3.5 pointer-events-none">
                            <svg class="w-4 h-4 text-natural dark:text-gray-400" aria-hidden="true"
                                 xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                            </svg>
                        </div>
                        <input
                            datepicker
                            type="text"
                            class="w-full border border-natural bg-transparent h-11 pl-[21%] max-lg:pl-[12%] py-1 rounded-lg text-natural
                      placeholder-color font-normal text-normal
                      focus:outline-none focus:border-primary_color focus:ring-1 focus:ring-background_color"
                            placeholder="select start date"
                            name="start_date"
                            value="{{request()->query('start_date')}}"
                        />
                    </div>

                    <div class="relative w-[19%] max-lg:w-[100%]">
                        <label class="font-big text-normal text-natural">End date</label>
                        <div class="absolute bottom-[20%] start-0 flex items-center ps-3.5 pointer-events-none">
                            <svg class="w-4 h-4 text-natural dark:text-gray-400" aria-hidden="true"
                                 xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                            </svg>
                        </div>
                        <input
                            datepicker
                            type="text"
                            class="w-full border border-natural bg-transparent h-11 pl-[21%] max-lg:pl-[12%] py-1 rounded-lg text-natural
                    placeholder-color font-normal text-normal
                    focus:outline-none focus:border-primary_color focus:ring-1 focus:ring-background_color"
                            placeholder="select end date"
                            name="end_date"
                            value="{{request()->query('end_date')}}"
                        />
                    </div>

                    <div class="w-[26%] max-lg:w-[100%]">
                        <label class="font-big text-normal text-natural">Select Site</label>
                        <label>
                            <select
                                class="select-2-sites cursor-pointer w-full border border-natural bg-db h-[44px] px-2 py-1 rounded-lg text-normal font-normal text-natural"
                                name="site_id"
                            >
                                <option class="" value="">All site</option>
                                @foreach($sites as $site)
                                    <option
                                        value="{{$site->id}}" {{ request()->query('site_id') == $site->id ? "selected" : '' }}>{{$site->name}}</option>
                                @endforeach
                            </select>
                        </label>
                    </div>

                    <div class="mt-[2.5%] flex flex-row justify-between items-center w-[25%] max-lg:w-[100%]">
                        <button
                            type="button"
                            class="cursor-pointer w-[45%] h-[44px] outline-none bg-transparent text-natural text-normal rounded-lg font-semibold px-[16px] py-[10px] border border-primary_color"
                            onclick="resetForm()">
                            Reset
                            <button
                                class="cursor-pointer w-[45%] h-[44px] outline-none bg-primary_color text-natural text-normal rounded-lg font-big px-[16px] py-[10px]">
                                Search
                            </button>
                    </div>
                </div>

                <div class="flex flex-row items-center justify-end w-[15%] max-lg:w-[100%] mt-[2.5%]">
                    <span class="text-primary_color text-normal font-big">Export</span>
                    <img src="{{ asset('assets/images/export2.png')}}" alt="dashboard" class="ml-2 w-[16px] h-[16px]"/>
                </div>
            </div>
            <!-- end of filter search -->
        </form>


        <!-- table -->
        <section class="border border-table py-1 mt-[2%] rounded-lg">
            <div class="overflow-x-auto">
                <table class="table-auto w-[100%] max-lg:w-[1000px] bg-background_color">
                    <thead>
                    <tr class="overflow-x-auto">
                        <th class="text-left text-small text-natural font-big  px-small py-smaller">Scan Date</th>
                        <th class="text-left text-small text-natural font-big  px-small py-smaller">Scan Time</th>
                        <th class="text-left text-small text-natural font-big px-small py-smaller">Tags</th>
                        <th class="text-left text-small text-natural font-big px-small py-smaller">Site</th>
                        <th class="text-left text-small text-natural font-big px-small py-smaller">Longitude</th>
                        <th class="text-left text-small text-natural font-big px-small py-smaller">Latitude</th>
                        <th class="text-left text-small text-natural font-big px-small py-smaller">Distance</th>
                        <th class="text-left text-small text-natural font-big px-small py-smaller">Proximity</th>
                        {{--                        <th class="text-left text-small text-natural font-big px-small py-smaller">Gap</th>--}}
                    </tr>
                    </thead>
                    <tbody>

                    @forelse($scans as $scan)
                        <tr class="border border-table border-x-0 text-natural hover:bg-db">
                            <td class="text-normal font-normal px-small">
                                <div>{{$scan->scan_date->format('d/m/Y')}}</div>
                            </td>
                            <td class="text-normal font-normal px-small">
                                <div>{{Carbon\Carbon::parse($scan->scan_time)->format('g:i A')}}</div>
                            </td>
                            <td class="text-normal font-normal px-small">{{$scan->tag->name}}</td>
                            <td class="text-normal font-normal px-small">{{$scan->site->name}}</td>
                            <td class="text-normal font-normal p-small">{{$scan->longitude ?? '-'}}</td>
                            <td class="text-normal font-normal px-small">{{$scan->longitude ?? '-'}}</td>
                            <td class="text-normal font-normal px-small">{{$scan->distance}} km</td>
                            <td class="text-normal font-normal px-small">{{$scan->proximity}}</td>
                            {{--                            <td class="text-normal font-normal px-small">00h00</td>--}}
                        </tr>
                    @empty
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
        $(document).ready(function () {
            $('.select-2-sites').select2({
                placeholder: "Select a site",
                allowClear: true
            });
        });

        function resetForm() {
            $(".select-2-sites").val('').trigger('change')
            document.getElementById("search-form").reset();
            window.location.replace(location.pathname);
        }
    </script>
@endpush
