@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')

    <!-- tag section -->
    <section class="flex flex-row justify-between w-[100%] max-lg:flex-col max-lg:mt-[15%]">
        <div
            class="flex flex-row bg-background_color rounded-lg h-[111px] w-[290px] items-center px-[20px] max-lg:mx-auto">
            <div class="w-[44px] h-[44px] bg-blue-500 rounded-lg flex flex-row items-center justify-center">
                <span class="material-symbols-outlined text-white">home</span>
            </div>
            <div class="ml-[5%]">
                <h1 class="font-bold text-3xl  text-blue-500">{{$countOfSites}}</h1>
                <span class="font-normal text-sm text-blue-500">Sites</span>
            </div>
        </div>

        <div
            class="flex flex-row bg-background_color rounded-lg h-[111px] w-[290px] items-center px-[20px] max-lg:mt-[5%] max-lg:mx-auto">
            <div class="w-[44px] h-[44px] bg-tags rounded-lg flex flex-row items-center justify-center">
                <span class="material-symbols-outlined text-white">tag</span>
            </div>
            <div class="ml-[5%]">
                <h1 class="font-bold text-3xl text-tags">{{$countOfTags}}</h1>
                <span class="font-normal text-sm text-tags">Tags</span>
            </div>
        </div>

        <div
            class="flex flex-row bg-background_color rounded-lg h-[111px] w-[290px] items-center px-[20px] max-lg:mt-[5%] max-lg:mx-auto">
            <div class="w-[44px] h-[44px] bg-guards rounded-lg flex flex-row items-center justify-center">
                <span class="material-symbols-outlined text-white">lock</span>
            </div>
            <div class="ml-[5%]">
                <h1 class="font-bold text-3xl text-guards">{{$countOfGuards}}</h1>
                <span class="font-normal text-sm text-guards">Personnel</span>
            </div>
        </div>
    </section>

    <!-- table section -->
    <section class="pt-basic_padding overflow-x-auto max-lg:w-[100%] max-lg:mt-[5%]">
        <div class="font-big text-big text-natural mb-2%"> Recent Scan Report</div>
        <section class="border border-table mt-[2%] rounded-lg bg-background_color overflow-x-auto">
        <table class=" table-fixed w-[100%] bg-background_color rounded-lg max-lg:w-[1000px]">
            <thead>
            <tr class="border border-x-0 border-y-0 border-table border-collapse">
                <th class="text-left text-small text-natural font-big  px-small py-[1%] w-[10%]">Scan Date/Time</th>
                <th class="text-left text-small text-natural font-big px-small py-[1%] w-[15%]">Tag Name</th>
                <th class="text-left text-small text-natural font-big px-small py-[1%] w-[15%]">Site Name</th>
                <th class="text-left text-small text-natural font-big px-small py-[1%] w-[20%]">Proximity</th>
                <th class="text-left text-small text-natural font-big px-small py-[1%] w-[10%]">Distance</th>
                <th class="text-left text-small text-natural font-big px-small py-[1%] w-[10%]">Round</th>
                <th class="text-left text-small text-natural font-big px-small py-[1%] w-[10%]">Gap</th>
            </tr>
            </thead>
            <tbody>
            @forelse($latestScans as $scan)
                <tr class="border border-table border-x-0 text-natural hover:bg-db">
                    <td class="text-normal font-normal px-small py-smaller">
                        <div>{{$scan->scan_date->format('d/m/Y')}}</div>
                        <div>{{Carbon\Carbon::parse($scan->scan_time)->format('g:i A')}}</div>
                    </td>
                    <td class="text-normal font-normal px-small py-smaller">{{$scan->tag->name}}</td>
                    <td class="text-normal font-normal px-small py-smaller">{{$scan->site->name}}</td>
                    <td class="text-normal font-normal px-small py-smaller">{{$scan->proximity}}</td>
                    <td class="text-normal font-normal px-small py-smaller">{{$scan->distance}} KM</td>
                    <td class="text-normal font-normal px-small">{{$scan->round}}</td>
                    <td class="text-normal font-normal px-small">{{secondsToHoursMinutes($scan->gap_duration)}}</td>
                </tr>
            @empty

                <tr class="text-normal font-normal border border-table border-collapse text-natural hover:bg-db">
                    <td class="text-center" colspan="7">No Data</td>
                </tr>

            @endforelse
            </tbody>
        </table>
        </section>
    </section>

    <!-- table 2 section -->
    <section class="pt-basic_padding max-lg:w-[100%] max-lg:mt-[5%]">
        <div class="font-big text-big text-natural mb-2%">Recent Attendance Report</div>
        <section class="border border-table mt-[2%] rounded-lg bg-background_color overflow-x-auto">
            <table class="table-fixed w-[100%] bg-background_color max-lg:w-[1000px]">
                <thead>
                <tr class="">
                    <th class="text-left text-small text-natural font-big  px-small py-smaller w-[15%]">
                        Name
                    </th>
                    <th class="text-left text-small text-natural font-big  px-small py-smaller w-[10%]">Time/Date</th>
                    <th class="text-left text-small text-natural font-big  px-small py-smaller w-[15%]">Action Type</th>
                    {{--                    <th class="text-left text-small text-natural font-big px-small py-smaller">Tags</th>--}}
                    <th class="text-left text-small text-natural font-big px-small py-smaller w-[15%]">Site</th>
                    <th class="text-left text-small text-natural font-big px-small py-smaller w-[10%]">Distance</th>
                    <th class="text-left text-small text-natural font-big px-small py-smaller w-[10%]">Image</th>
                    <th class="text-left text-small text-natural font-big px-small py-smaller w-[15%]">Proximity</th>
                </tr>
                </thead>
                <tbody>
                @forelse($latestAttendance as $attendance)
                    <tr class="border border-table border-x-0 border-b-0 text-natural hover:bg-db">
                        <td class="text-normal font-normal px-small">{{$attendance->user->first_name}} {{$attendance->user->last_name}}</td>
                        <td class="text-normal font-normal px-small">
                            <div>{{$attendance->attendance_date->format('d/m/Y')}}</div>
                            <div>{{Carbon\Carbon::parse($attendance->attendance_time)->format('g:i A')}}</div>
                        </td>
                        <td class="text-normal font-normal px-small">
                            @if($attendance->action_type == 'check_in')
                                <button
                                    class="bg-checkin W-[78px] h-[22px] p-5% rounded-full flex flex-row items-center justify-between">
                                    <img src="{{asset('assets/images/green_dot.png')}}" alt="dashboard" class="mr-2"/>
                                    <span class="text-checkInText font-big text-small">Check in</span>
                                </button>
                            @endif
                            @if($attendance->action_type == 'check_out')
                                <button
                                    class="bg-checkout W-[78px] h-[22px] p-5% rounded-full flex flex-row items-center justify-between">
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

                    <tr class="text-normal font-normal border border-table border-collapse text-natural hover:bg-db">
                        <td class="text-center" colspan="7">No Data</td>
                    </tr>

                @endforelse

                </tbody>
            </table>
        </section>
    </section>

@endsection
