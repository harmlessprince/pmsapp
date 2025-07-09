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
        <x-filter-card :actionUrl="route('admin.attendance.index')" :canSearch="true"
                       :searchPlaceholder="'Search by name'" :canExport="true" :canDelete="true">
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
                        placeholder="Select end date"
                        name="attendance_date_to_date"
                        :value="request()->query('attendance_date_to_date')"
                    />
                </div>
            </div>

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
            <div class="flex flex-col" id="attendance_action_type_container">
                <x-input-label for="attendance_action_type" :value="__('Action type')"/>
                <x-select-input id="attendance_action_type" class="block mt-1 w-full"
                                name="attendance_action_type">
                    <option value="">Select Action Type</option>
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

        </x-filter-card>

        <!-- table -->
        <section class="border border-table mt-[2%] rounded-lg">
            <div class="overflow-x-auto">
                <table class="table-fixed w-[100%] max-lg:w-[1000px] bg-background_color">
                    <thead>
                    <tr class="">
                        <th class="text-left text-small text-natural font-big  px-smaller py-smaller w-[13%]">
                            Name
                        </th>
                        <th class="text-left text-small text-natural font-big  px-smaller py-smaller">Time/Date</th>
                        <th class="text-left text-small text-natural font-big  px-smaller py-smaller">Action Type</th>
                        <th class="text-left text-small text-natural font-big px-smaller py-smaller w-[15%]">Site</th>
                        <th class="text-left text-small text-natural font-big px-smaller py-smaller w-[17%]">Company</th>
{{--                        <th class="text-left text-small text-natural font-big px-smaller py-smaller">Distance</th>--}}
                        <th class="text-left text-small text-natural font-big px-smaller py-smaller">Image</th>
                        <th class="text-left text-small text-natural font-big px-smaller py-smaller w-[13%]">Proximity</th>
                        <th class="text-center text-small text-natural font-big px-smaller py-smaller">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($attendances as $attendance)
                        <tr class="border border-table border-x-0 text-natural hover:bg-db">
                            <td class="text-normal font-normal px-smaller">{{$attendance->user->first_name}} {{$attendance->user->last_name}}</td>
                            <td class="text-normal font-normal px-smaller">
                                <div>{{$attendance->attendance_date->format('d/m/Y')}}</div>
                                <div>{{Carbon\Carbon::parse($attendance->attendance_time)->format('g:i A')}}</div>
                            </td>
                            <td class="text-normal font-normal px-smaller">
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
                            <td class="text-normal font-normal px-smaller">{{$attendance->site->name}}</td>
                            <td class="text-normal font-normal px-smaller">{{$attendance->company->display_name}}</td>
{{--                            <td class="text-normal font-normal px-smaller">{{round($attendance->distance, 2)}} KM</td>--}}
                            <td class="text-normal font-normal px-smaller">
                                <img src="{{ $attendance->image ?? asset('assets/images/tableImg.png')}}"
                                     alt="dashboard"
                                     class=" w-[60px] h-[60px]"
                                     data-modal-target="imageViewModalElement"
                                     data-modal-toggle="imageViewModalElement"
                                     onclick='showImageModal("{{$attendance->image}}")'
                                />
                            </td>
                            <td class="text-normal font-normal p-smaller">{{$attendance->proximity}}</td>
                            <td class="px-small">
                                <div class="flex flex-row justify-end">
                                    <form id="frm-delete-item-{{$attendance->id}}"
                                          action="{{ route('admin.attendance.destroy', ['attendance' => $attendance]) }}"
                                          style="display: none;" method="POST">
                                        @csrf
                                        @method('delete')

                                    </form>
                                    <a href=""
                                       onclick='deleteItem(event, {{"$attendance->id"}})' title="Delete a personnel attendance">
                                            <span
                                                class="material-symbols-outlined mr-4 w-[24px] h-[24px] text-red-500 cursor-pointer">delete</span>
                                    </a>
                                </div>
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
            {{ $attendances->links() }}
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
