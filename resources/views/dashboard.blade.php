@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')

    <!-- tag section -->
    <section class="flex flex-row justify-between w-[100%] max-lg:flex-col max-lg:mt-[15%]">
        <div
            class="flex flex-row bg-background_color rounded-lg h-[111px] w-[290px] items-center px-[20px] max-lg:mx-auto">
            <div class="w-[44px] h-[44px] bg-site rounded-lg flex flex-row items-center justify-center">
                <img src="{{asset('assets/images/site.png')}}" alt="dashboard"/>
            </div>
            <div class="ml-[5%]">
                <h1 class="font-bold text-3xl text-site">{{$countOfSites}}</h1>
                <span class="font-normal text-sm text-site">Sites</span>
            </div>
        </div>

        <div
            class="flex flex-row bg-background_color rounded-lg h-[111px] w-[290px] items-center px-[20px] max-lg:mt-[5%] max-lg:mx-auto">
            <div class="w-[44px] h-[44px] bg-tags rounded-lg flex flex-row items-center justify-center">
                <img src="{{asset('assets/images/site.png')}}" alt="dashboard"/>
            </div>
            <div class="ml-[5%]">
                <h1 class="font-bold text-3xl text-tags">{{$countOfTags}}</h1>
                <span class="font-normal text-sm text-tags">Tags</span>
            </div>
        </div>

        <div
            class="flex flex-row bg-background_color rounded-lg h-[111px] w-[290px] items-center px-[20px] max-lg:mt-[5%] max-lg:mx-auto">
            <div class="w-[44px] h-[44px] bg-guards rounded-lg flex flex-row items-center justify-center">
                <img src="{{asset('assets/images/site.png')}}" alt="dashboard"/>
            </div>
            <div class="ml-[5%]">
                <h1 class="font-bold text-3xl text-guards">{{$countOfUsers}}</h1>
                <span class="font-normal text-sm text-guards">Guards</span>
            </div>
        </div>
    </section>

    <!-- table section -->
    <section class="pt-basic_padding overflow-x-auto max-lg:w-[100%] max-lg:mt-[5%]">
        <div class="font-big text-big text-natural mb-2%"> Recent Scan Report</div>
        <table class="table-auto w-[100%] bg-background_color rounded-lg max-lg:w-[1000px]">
            <thead>
            <tr class="border border-x-0 border-y-0 border-table border-collapse">
                <th class="text-left text-small text-natural font-big  px-small py-[1%]">Scan Date/Time</th>
                <th class="text-left text-small text-natural font-big px-small py-[1%]">Tags</th>
                <th class="text-left text-small text-natural font-big px-small py-[1%]">Site</th>
                <th class="text-left text-small text-natural font-big px-small py-[1%]">Proximity</th>
                <th class="text-left text-small text-natural font-big  px-small py-[1%]">Longitude</th>
                <th class="text-left text-small text-natural font-big  px-small py-[1%]">Latitude</th>
                <th class="text-left text-small text-natural font-big px-small py-[1%]">Distance</th>
            </tr>
            </thead>
            <tbody>
            <tr class="border border-table border-x-0 text-natural hover:bg-db">
                <td class="text-normal font-normal px-small py-smaller">
                    <div>3/10/2023</div>
                    <div>5:00pm</div>
                </td>
                <td class="text-normal font-normal px-small py-smaller">Tag name</td>
                <td class="text-normal font-normal px-small py-smaller">Site name</td>
                <td class="text-normal font-normal px-small py-smaller">Very close</td>
                <td class="text-normal font-normal px-small py-smaller">2</td>
                <td class="text-normal font-normal px-small py-smaller">2</td>
                <td class="text-normal font-normal px-small py-smaller">1</td>
            </tr>

            <tr class="border border-table border-x-0 text-natural hover:bg-db">
                <td class="text-normal font-normal px-small py-smaller">
                    <div>3/10/2023</div>
                    <div>5:00pm</div>
                </td>
                <td class="text-normal font-normal px-small py-smaller">Tag name</td>
                <td class="text-normal font-normal px-small py-smaller">Site name</td>
                <td class="text-normal font-normal px-small py-smaller">Very close</td>
                <td class="text-normal font-normal px-small py-smaller">2</td>
                <td class="text-normal font-normal px-small py-smaller">2</td>
                <td class="text-normal font-normal px-small py-smaller">1</td>
            </tr>

            <tr class="border border-table border-x-0 text-natural hover:bg-db">
                <td class="text-normal font-normal px-small py-smaller">
                    <div>3/10/2023</div>
                    <div>5:00pm</div>
                </td>
                <td class="text-normal font-normal px-small py-smaller">Tag name</td>
                <td class="text-normal font-normal px-small py-smaller">Site name</td>
                <td class="text-normal font-normal px-small py-smaller">Very close</td>
                <td class="text-normal font-normal px-small py-smaller">2</td>
                <td class="text-normal font-normal px-small py-smaller">2</td>
                <td class="text-normal font-normal px-small py-smaller">1</td>
            </tr>

            <tr class="border border-table border-x-0 text-natural">
                <td class="text-normal font-normal px-small py-smaller">
                    <div>3/10/2023</div>
                    <div>5:00pm</div>
                </td>
                <td class="text-normal font-normal px-small py-smaller">Tag name</td>
                <td class="text-normal font-normal px-small py-smaller">Site name</td>
                <td class="text-normal font-normal px-small py-smaller">Very close</td>
                <td class="text-normal font-normal px-small py-smaller">2</td>
                <td class="text-normal font-normal px-small py-smaller">2</td>
                <td class="text-normal font-normal px-small py-smaller">1</td>
            </tr>
            </tbody>
        </table>
    </section>

    <!-- table 2 section -->
    <section class="pt-basic_padding max-lg:w-[100%] max-lg:mt-[5%]">
        <div class="font-big text-big text-natural mb-2%">Recent Attendance Report</div>
        <section class="border border-table py-1 mt-[2%] rounded-lg bg-background_color overflow-x-auto">
            <table class="table-auto w-[100%] bg-background_color max-lg:w-[1000px]">
                <thead>
                <tr class="">
                    <th class="text-left text-small text-natural font-big  px-small py-smaller">Security guard
                        name
                    </th>
                    <th class="text-left text-small text-natural font-big  px-small py-smaller">Time/Date</th>
                    <th class="text-left text-small text-natural font-big  px-small py-smaller">Action Type</th>
                    <th class="text-left text-small text-natural font-big px-small py-smaller">Tags</th>
                    <th class="text-left text-small text-natural font-big px-small py-smaller">Site</th>
                    <th class="text-left text-small text-natural font-big px-small py-smaller">Distance</th>
                    <th class="text-left text-small text-natural font-big px-small py-smaller">Image</th>
                    <th class="text-left text-small text-natural font-big px-small py-smaller">Proximity</th>
                </tr>
                </thead>
                <tbody>
                <tr class="border border-table border-x-0 border-b-0 text-natural hover:bg-db">
                    <td class="text-normal font-normal px-small">Olatunji Afeez</td>
                    <td class="text-normal font-normal px-small">
                        <div>3/10/2023</div>
                        <div>5:00pm</div>
                    </td>
                    <td class="text-normal font-normal px-small">
                        <button
                            class="bg-checkin W-[78px] h-[22px] p-5% rounded-full flex flex-row items-center justify-between">
                            <img src="{{asset('assets/images/green_dot.png')}}" alt="dashboard" class="mr-2"/>
                            <span class="text-checkInText font-big text-small">Check in</span>
                        </button>
                    </td>
                    <td class="text-normal font-normal px-small">Tag name</td>
                    <td class="text-normal font-normal px-small">Site name</td>
                    <td class="text-normal font-normal px-small">1</td>
                    <td class="text-normal font-normal px-small">
                        <img src="{{asset('assets/images/tableImg.png')}}" alt="dashboard" class=" w-[60px] h-[60px]"/>
                    </td>
                    <td class="text-normal font-normal p-small">Very close</td>
                </tr>

                <tr class="border border-table border-x-0 border-b-0 text-natural hover:bg-db">
                    <td class="text-normal font-normal  px-small py-smallest">Olatunji Afeez</td>
                    <td class="text-normal font-normal  px-small py-smallest">
                        <div>3/10/2023</div>
                        <div>5:00pm</div>
                    </td>
                    <td class="text-normal font-normal px-small">
                        <button
                            class="bg-checkout W-[78px] h-[22px] p-5% rounded-full flex flex-row items-center justify-between">
                            <img src="{{asset('assets/images/red_dot.png')}}" alt="dashboard" class="mr-2"/>
                            <span class="text-checkInText font-big text-small">Check out</span>
                        </button>
                    </td>
                    <td class="text-normal font-normal  px-small py-smallest">Tag name</td>
                    <td class="text-normal font-normal  px-small py-smallest">Site name</td>
                    <td class="text-normal font-normal  px-small py-smallest">1</td>
                    <td class="text-normal font-normal px-small  py-smallest">
                        <img src="{{asset('assets/images/tableImg.png')}}" alt="dashboard" class=" w-[60px] h-[60px]"/>
                    </td>
                    <td class="text-normal font-normal px-small py-smallest">Very close</td>
                </tr>

                <tr class="border border-table border-x-0 border-b-0 text-natural hover:bg-db">
                    <td class="text-normal font-normal  px-small py-smallest">Olatunji Afeez</td>
                    <td class="text-normal font-normal  px-small py-smallest">
                        <div>3/10/2023</div>
                        <div>5:00pm</div>
                    </td>
                    <td class="text-normal font-normal px-small">
                        <button
                            class="bg-checkout W-[78px] h-[22px] p-5% rounded-full flex flex-row items-center justify-between">
                            <img src="{{asset('assets/images/red_dot.png')}}" alt="dashboard" class="mr-2"/>
                            <span class="text-checkInText font-big text-small">Check out</span>
                        </button>
                    </td>
                    <td class="text-normal font-normal  px-small py-smallest">Tag name</td>
                    <td class="text-normal font-normal  px-small py-smallest">Site name</td>
                    <td class="text-normal font-normal  px-small py-smallest">1</td>
                    <td class="text-normal font-normal px-small  py-smallest">
                        <img src="{{asset('assets/images/tableImg.png')}}" alt="dashboard" class=" w-[60px] h-[60px]"/>
                    </td>
                    <td class="text-normal font-normal px-small py-smallest">Very close</td>
                </tr>
                </tbody>
            </table>
        </section>
    </section>

@endsection
