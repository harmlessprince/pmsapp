@extends('layouts.app')
@section('title', 'Dashboard')
@section('page', 'User Management')
@push('header-scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
@endpush
@section('content')

    <section>
        <section class="flex flex-row justify-between w-[100%] max-lg:mt-[15%]">
            <div
                class="flex flex-row bg-background_color rounded-lg h-[111px] w-[290px] items-center px-[20px] max-lg:mx-auto">
                <div class="w-[44px] h-[44px] bg-guards rounded-lg flex flex-row items-center justify-center">
                    <img src="{{asset('assets/images/site.png')}}" alt="dashboard"/>
                </div>
                <div class="ml-[5%]">
                    <h1 class="font-bold text-3xl text-guards">{{$countOfGuards}}</h1>
                    <span class="font-normal text-sm text-guards">Guards</span>
                </div>
            </div>
        </section>

        <!-- table section -->
        <section class="pt-basic_padding">
            <!-- add site -->
            <div class="font-big text-big text-natural mb-2 flex flex-row justify-between">
                <div>Added Users</div>
            </div>

            <!-- filter sites -->
            <div class="flex flex-row justify-between items-center max-lg:flex-col max-lg:items-start">
                <div class="relative max-lg:mb-2 max-lg:w-[70%]">
                    <div onclick="toggleFilter()"
                         class="rounded-lg border border-natural flex flex-row items-center px-[16px] py-[10px] cursor-pointer">
                        <img src="{{asset('assets/images/filters.png')}}" class="w-[20px] h-[20px]" alt="plus"/>
                        <span class="text-natural font-big text-normal ml-2"> More filters</span>
                    </div>
                    <div id="filter"
                         class="z-20 absolute hidden bottom-[-630%] max-lg:bottom-[-650%] max-lg:mb-3 w-[420px] max-lg:w-[100%] bg-white rounded-lg p-[10%] max-lg:p-[5%]">
                        <div class="flex flex-row items-center justify-between mb-2">
                            <span class="font-big text-eighteen text-filter">Filters</span>
                            <img onclick="toggleFilter()" src="{{asset('assets/images/close.png')}}"
                                 class="w-[12px] h-[12px] cursor-pointer" alt="plus"/>
                        </div>

                        <form action="{{route('company.users.index')}}" id="search-form-1">
                            <div class="w-full mb-3">
                                <label class="font-big text-normal text-filter_text">Filter by Site</label>
                                <select
                                    class="outline-none w-full border border-filterInput bg-transparent h-[44px] px-2 py-1 rounded-lg text-normal font-normal text-filter_text site"
                                    name="site_id"
                                >
                                    <option value="">Select Site</option>
                                    @foreach($sites as $site)
                                        <option value="{{$site->id}}" {{ request()->query('site_id') == $site->id ? "selected" : '' }}>{{$site->name}}</option>
                                    @endforeach
                                </select>
                            </div>
{{--                            <div class="w-full mb-3">--}}
{{--                                <label class="font-big text-normal text-filter_text">Filter by Country</label>--}}
{{--                                <select--}}
{{--                                    class="outline-none w-full border border-filterInput bg-transparent h-[44px] px-2 py-1 rounded-lg text-normal font-normal text-filter_text">--}}
{{--                                    <option>Nigeria</option>--}}
{{--                                    <option>Cape Verde</option>--}}
{{--                                </select>--}}
{{--                            </div>--}}
                            <button
                                type="reset"
                                class="mt-[1%] w-[67px] h-[40px] bg-transparent rounded-lg text-normal text-primary_color font-big border border-primary_color" onclick="resetForm()">
                                Clear
                            </button>
                            <button
                                class="mt-[1%] w-[67px] h-[40px] bg-primary_color rounded-lg text-normal text-natural font-big ml-3">
                                Filter
                            </button>
                        </form>
                    </div>
                </div>
                <form action="{{route('company.users.index')}}" id="search-form-2">
                    <div class="flex flex-row items-center max-lg:flex-col max-lg:items-start max-lg:w-full">

                        <div class="relative max-lg:w-full">
                            <div class="relative max-lg:w-[100%]">
                                <img src="{{asset('assets/images/search.png')}}" alt="search"
                                     class="absolute w-[15px] h-[15px] left-[5%] bottom-[32%]"/>
                                <input
                                    type="search"
                                    placeholder="Search by name or phone number"
                                    class="font-normal text-natural text-medium placeholder-natural outline-none  w-[400px] max-lg:w-[100%]  h-[46px] rounded-lg bg-transparent border border-natural px-[10%]"
                                    name="searchTerm"
                                    value="{{request()->query('searchTerm', null)}}"
                                />
                            </div>
                            <div>
                                <button
                                    type="reset"
                                    class="cursor-pointer w-[45%] h-[44px] outline-none bg-transparent text-natural text-normal rounded-lg font-semibold px-[16px] py-[10px] border border-primary_color"
                                    onclick="resetForm()">
                                    Reset
                                </button>
                            </div>

                        </div>
                        <button
                            class="w-[80px] h-[40px] outline-none bg-primary_color text-natural text-normal rounded-lg font-big  ml-[25px] max-lg:ml-0 max-lg:mt-2">
                            Search
                        </button>


                    </div>
                </form>
            </div>

            <!-- table 2 section -->
            <section class="border border-table rounded-lg w-[100%] mt-[2%] bg-background_color">
                <div class="overflow-x-auto">
                    <table class="table-auto w-[100%] max-lg:w-[1000px]">
                        <thead class="">
                        <tr class="text-left text-small text-natural font-big">
                            <th class=" px-small py-[1%]">Name</th>
                            <th class="px-small py-[1%]">Phone number</th>
                            <th class="px-small py-[1%]">Country</th>
                            <th class="px-small py-[1%]">State</th>
                            <th class="px-small py-[1%]">Postal Address</th>
                            <th class="px-small py-[1%]">Site</th>
                            <th class="px-small py-[1%]">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($users as $user)
                            <tr class="text-normal font-normal border border-table border-collapse text-natural hover:bg-db">

                                <td class="text-natural px-small py-small flex flex-row items-center">
                                    <div class="w-[40px] h-[40px] rounded-full">
                                        <img src="{{$user->profile_image}}" alt="Profile Image"
                                             class="rounded-full w-[40px] h-[40px]">
                                    </div>
                                    <span class="ml-2">{{$user->first_name}} {{$user->last_name}}</span>
                                </td>

                                <td class="px-small">
                                    {{$user->phone_number}}
                                </td>
                                <td class="px-small">
                                    {{$user->state->country->name ?? "N/A"}}
                                </td>
                                <td class="px-small">
                                    {{$user->state->name ?? "N/A"}}
                                </td>
                                <td class="px-small truncate">{{ \Illuminate\Support\Str::limit($user->address, 15)}}</td>
                                <td class="px-small">{{$user->site->name ?? 'N/A'}}</td>

                                <td class="px-small">
                                    <div class="flex flex-row justify-center">
                                        <a href="{{route('company.users.edit', ['user' => $user->id])}}">
                                            <img src="{{asset('assets/images/edit.png')}}" alt="edit"
                                                 class="w-[16px] h-[16px] ml-3 cursor-pointer"/>
                                        </a>

                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr class="text-normal font-normal border border-table border-collapse text-natural hover:bg-db">
                                <td class="text-center" rowspan="6">No Data</td>
                            </tr>
                        @endforelse


                        </tbody>
                    </table>
                </div>
                {{ $users->links() }}
            </section>
        </section>
    </section>
@endsection


@push('scripts')
    <script>
        const filterDropdown = document.querySelector("#filter");
        const toggleFilter = () => {
            filterDropdown.classList.toggle("hidden")
        }
        function resetForm() {
            $(".site").val('').trigger('change')
            document.getElementById("search-form-1").reset();
            document.getElementById("search-form-2").reset();
            window.location.replace(location.pathname);
        }
    </script>
@endpush

