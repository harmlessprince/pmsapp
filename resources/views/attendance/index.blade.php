@extends('layouts.app')
@section('title', 'Attendance')
@section('page')
    <h2>Attendance Transactions</h2>
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
    <section class="">
        <x-filter-card>
            <form method="GET" action="{{route('company.attendance.transactions')}}" id="search-form">
                <input value="yes" name="date" hidden/>
                <div class="relative mb-10 w-full flex  items-center justify-between rounded-md">
                    <svg class="absolute left-2 block h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                         width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                         stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="11" cy="11" r="8" class=""></circle>
                        <line x1="21" y1="21" x2="16.65" y2="16.65" class=""></line>
                    </svg>
                    <x-text-input id="search" class="h-12 w-full cursor-text bg-db py-4 pr-40 pl-12" type="text"
                                  name="searchTerm" placeholder="Search by name"
                                  :value="request()->query('searchTerm')"/>
                </div>

                <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                    <div class="flex flex-col">
                        <x-input-label for="per_page" :value="__('Number of rows')"/>
                        <x-select-input id="per_page" class="block w-full" name="per_page">
                            <option class="" value="15" {{ request()->query('per_page') == 15 ? "selected" : '' }}>
                                15 rows
                            </option>
                            @for ($i = 10; $i <= 50; $i += 10)
                                <option class=""
                                        value="{{$i}}" {{ request()->query('per_page') == $i ? "selected" : '' }}> {{$i}}
                                    rows
                                </option>
                            @endfor
                        </x-select-input>
                    </div>

                    <div class="flex flex-col">
                        <div class="relative">
                            <x-input-label for="attendance_date_from_date" :value="__('Start date')"/>
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
                                name="attendance_date_from_date"
                                :value="request()->query('attendance_date_from_date')"
                            />
                        </div>
                    </div>
                    <div class="flex flex-col">
                        <div class="relative">
                            <x-input-label for="attendance_date_to_date" :value="__('End date')"/>
                            <div class="absolute bottom-[20%] start-0 flex items-center ps-3.5 pointer-events-none">
                                <svg class="w-4 h-4 text-natural dark:text-gray-400" aria-hidden="true"
                                     xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                </svg>
                            </div>
                            <x-text-input
                                id="attendance_date_to_date"
                                class="block w-full pl-[20%]"
                                type="text"
                                datepicker
                                datepicker-autohide
                                datepicker-format="dd-mm-yyyy"
                                type="text"
                                placeholder="Select start date"
                                name="attendance_date_to_date"
                                :value="request()->query('attendance_date_to_date')"
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
                        <x-input-label for="attendance_action_type" :value="__('Action type')"/>
                        <x-select-input id="attendance_action_type" class="block mt-1 w-full"
                                        name="attendance_action_type">
                            <option value="">Select Action</option>
                            <option
                                value="check_in" {{ request()->query('attendance_action_type') == 'check_in' ? "selected" : '' }}>
                                Check In
                            </option>
                            <option
                                value="check_out" {{ request()->query('attendance_action_type') == 'check_out' ? "selected" : '' }}>
                                Check Out
                            </option>
                        </x-select-input>
                    </div>
                </div>

                <div class="mt-6  w-full">
                    <div class=" w-full flex justify-between px-5 py-3">
                        <div>
                            <x-icon-button class="px-8 py-2 text-primary_color hover:scale-75" type="submit">
                                <span class="material-symbols-outlined text-primary_color mr-1">export_notes</span>
                                <span class="text-primary_color">Export</span>
                            </x-icon-button>
                        </div>
                        <div class="grid w-full grid-cols-1 justify-end space-x-4 md:flex">
                            <x-secondary-button type="reset" class="px-8 py-2" onclick="resetForm()">Reset
                            </x-secondary-button>
                            <x-primary-button class="px-8 py-2" type="submit">Apply filters</x-primary-button>
                        </div>


                    </div>


                </div>
            </form>
        </x-filter-card>

        <!-- table -->
        <section class="border border-table py-1 mt-[2%] rounded-lg">
            <div class="overflow-x-auto">
                <table class="table-auto w-[100%] max-lg:w-[1000px] bg-background_color">
                    <thead>
                    <tr class="">
                        <th class="text-left text-small text-natural font-big  px-small py-smaller">
                            Name
                        </th>
                        <th class="text-left text-small text-natural font-big  px-small py-smaller">Time/Date</th>
                        <th class="text-left text-small text-natural font-big  px-small py-smaller">Action Type</th>
                        <th class="text-left text-small text-natural font-big px-small py-smaller">Site</th>
                        <th class="text-left text-small text-natural font-big px-small py-smaller">Distance</th>
                        <th class="text-left text-small text-natural font-big px-small py-smaller">Image</th>
                        <th class="text-left text-small text-natural font-big px-small py-smaller">Proximity</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($attendances as $attendance)
                        <tr class="border border-table border-x-0 text-natural hover:bg-db">
                            <td class="text-normal font-normal px-small">{{$attendance->user->first_name}} {{$attendance->user->last_name}}</td>
                            <td class="text-normal font-normal px-small">
                                <div>{{$attendance->attendance_date->format('d/m/Y')}}</div>
                                <div>{{Carbon\Carbon::parse($attendance->attendance_time)->format('g:i A')}}</div>
                            </td>
                            <td class="text-normal font-normal px-small">
                                @if($attendance->action_type == 'check_in')
                                    <button
                                        class="bg-checkin  px-2 py-1 me-2 rounded-full flex flex-row items-center justify-between">
                                        <img src="{{asset('assets/images/green_dot.png')}}" alt="dashboard"
                                             class="mr-2"/>
                                        <span class="text-checkInText font-big text-small">Check in</span>
                                    </button>
                                @endif
                                @if($attendance->action_type == 'check_out')
                                    <button
                                        class="bg-checkout  px-2 py-1 me-2 rounded-full flex flex-row items-center justify-between">
                                        <img src="{{asset('assets/images/red_dot.png')}}" alt="dashboard" class="mr-2"/>
                                        <span class="text-checkInText font-big text-small">Check out</span>
                                    </button>
                                @endif
                            </td>
                            <td class="text-normal font-normal px-small">{{$attendance->site->name}}</td>
                            <td class="text-normal font-normal px-small">{{$attendance->distance}} KM</td>
                            <td class="text-normal font-normal px-small">
                                <img src="{{ $attendance->user->profile_image ?? asset('assets/images/tableImg.png')}}"
                                     alt="dashboard"
                                     class=" w-[60px] h-[60px]"/>
                            </td>
                            <td class="text-normal font-normal p-small">{{$attendance->proximity}}</td>
                        </tr>
                    @empty
                        <tr class="border border-table border-x-0 text-natural hover:bg-db">
                            <td colspan="7" class="text-center">No Data</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
            {{ $attendances->links() }}
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
            document.getElementById("search-form-1").reset();
            window.location.replace(location.pathname);
        }
    </script>
@endpush
