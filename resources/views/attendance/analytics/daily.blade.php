@extends('layouts.app')
@section('title', 'Attendance Analytics')
@section('page', 'Attendance Analytics')
@push('header-scripts')
    <script src="https://cdn.tailwindcss.com"></script>
@endpush
@section('content')

    <section>
        <x-filter-card :actionUrl="route('company.attendance.analytics')" :hasTable="true" :canSearch="true" :searchPlaceholder="'Search by first name or last name'">
            <input value="yes" name="date" hidden/>
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
                        datepicker-format="yyyy-mm-dd"
                        type="text"
                        placeholder="Select start date"
                        name="attendance_date_from_date"
                        :value="request()->query('attendance_date_from_date', $defaultStartMonth)"
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
                        id="scan_date_to_date"
                        class="block w-full pl-[20%]"
                        type="text"
                        datepicker
                        datepicker-autohide
                        datepicker-format="yyyy-mm-dd"
                        type="text"
                        placeholder="Select start date"
                        name="attendance_date_to_date"
                        :value="request()->query('attendance_date_to_date', $defaultEndMonth)"
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
                <x-input-label for="frequency" :value="__('Time Period')" class="text-white"/>
                <x-select-input id="frequency" class="block w-full" name="frequency">
                    @foreach($frequencies as $frequency)
                        <option class="bg-background_color"
                                value="{{$frequency}}" {{ request()->query('frequency') == $frequency ? "selected" : '' }}>{{strtoupper($frequency)}}</option>
                    @endforeach
                </x-select-input>
            </div>

        </x-filter-card>
        <section class="border border-table rounded-lg w-[100%] mt-[2%] bg-background_color">
            <div class="overflow-x-auto">
                <table class="table-auto w-[100%] max-lg:w-[1000px]">
                    <thead class="">
                    <tr class="text-left text-small text-natural font-big">
                        <th class="px-small py-[1%]">Name</th>
                        <th class="px-small py-[1%]">Site</th>
                        <th class=" px-small py-[1%]">CheckedIn At</th>
                        <th class="px-small py-[1%]">Checkout At</th>
                        <th class="px-small py-[1%]">Hours Worked</th>
                        <th class="px-small py-[1%]">Checked Out</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($analytics as $analytic)
                        <tr class="text-normal font-normal text-natural border border-table border-collapse hover:bg-db">
                            <td class="px-small">
                                {{$analytic->user->first_name ?? ' '}}  {{$analytic->user->last_name ?? ' '}}
                            </td>
                            <td class="px-small">
                                {{$analytic->site->name ?? 'N/A'}}
                            </td>
                            <td class="text-natural px-small py-small">
                                <div>{{\Carbon\Carbon::parse($analytic->check_in_time)->format('d/m/Y')}}</div>
                                <div>{{Carbon\Carbon::parse($analytic->check_in_time)->format('g:i A')}}</div>
                            </td>
                            <td class="px-small">
                                <div>{{\Carbon\Carbon::parse($analytic->check_out_time)->format('d/m/Y')}}</div>
                                <div>{{Carbon\Carbon::parse($analytic->check_out_time)->format('g:i A')}}</div>
                            </td>
                            <td class="px-small">
                                {{secondsToHoursMinutes($analytic->check_in_to_checkout_duration)}}
                            </td>
                            <td class="px-small uppercase">
                                {{$analytic->check_in_to_checkout_duration > 0 ? "YES" : "NO" }}
                            </td>

                        </tr>
                    @empty
                        <tr class="text-normal font-normal border border-table border-collapse text-natural hover:bg-db">
                            <td class="text-center" colspan="7">No Data</td>
                        </tr>
                    @endforelse


                    </tbody>
                </table>
            </div>
            {{ $analytics->appends(request()->except('page'))->links() }}
        </section>
    </section>
@endsection
@push('scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/datepicker.min.js"></script>
    <script src="{{asset('assets/js/transaction.js')}}"></script>
    <script>
        function resetForm() {
            $(".select-2-sites").val('').trigger('change')
            document.getElementById("search-form").reset();
            window.location.replace(location.pathname);
        }

    </script>
@endpush

