@extends('layouts.app')
@section('title', 'Site Management')
@section('page', 'Site Management')

@push('header-scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
@endpush
@section('content')

    <section>
        <section class="flex flex-row justify-between w-[100%] max-lg:mt-[15%]">
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
        </section>

        <!-- table section -->
        <section class="pt-basic_padding">
            <div class="font-big text-big text-natural mb-2 flex flex-row items-center justify-between">
                <div>Added sites</div>
                <div
                    class="rounded-lg border border-primary_color flex flex-row items-center px-[16px] py-[10px] cursor-pointer">
                    <img src="{{asset('assets/images/plus.png')}}" class="w-[11px] h-[11px]" alt="plus"/>
                    <a href="{{route('company.sites.create')}}">
                        <span class="text-primary_color font-big text-normal ml-2"> Add new Site</span>
                    </a>
                </div>
            </div>

            <!-- filter sites -->
            <div class="flex flex-row justify-between items-center max-lg:flex-col max-lg:items-start">
                <div class="relative max-lg:mb-2 max-lg:w-[70%]">
                    <div onclick="toggleFilter()"
                         class="rounded-lg border border-natural flex flex-row items-center px-[16px] py-[10px] cursor-pointer">
                        <img src="../assets/images/filters.png" class="w-[20px] h-[20px]" alt="plus"/>
                        <span class="text-natural font-big text-normal ml-2"> More filters</span>
                    </div>
                    <div id="filter"
                         class="z-20 absolute hidden bottom-[-1000%] w-[420px] bg-white rounded-lg p-[10%] max-lg:p-[5%] max-lg:w-[100%] max-lg:mb-3 max-lg:bottom-[-1000%]">
                        <div class="flex flex-row items-center justify-between mb-2">
                            <span class="font-big text-eighteen text-filter">Filter Sites</span>
                            <img onclick="toggleFilter()" src="../assets/images/close.png"
                                 class="w-[12px] h-[12px] cursor-pointer" alt="plus"/>
                        </div>

                        <form>
                            <div class="w-full mb-3">
                                <label class="font-big text-normal text-filter_text">Filter by Site</label>
                                <select
                                    class="outline-none w-full border border-filterInput bg-transparent h-[44px] px-2 py-1 rounded-lg text-normal font-normal text-filter_text">
                                    <option>Select Site</option>
                                    <option>Site type</option>
                                    <option>Site type</option>
                                </select>
                            </div>

                            <div class="w-full mb-3">
                                <label class="font-big text-normal text-filter_text">Filter by Tag</label>
                                <select
                                    class="outline-none w-full border border-filterInput bg-transparent h-[44px] px-2 py-1 rounded-lg text-normal font-normal text-filter_text">
                                    <option>Buildin</option>
                                    <option>Road</option>
                                    <option>Mall</option>
                                </select>
                            </div>

                            <div class="w-full mb-3">
                                <label class="font-big text-normal text-filter_text">Filter by Country</label>
                                <select
                                    class="outline-none w-full border border-filterInput bg-transparent h-[44px] px-2 py-1 rounded-lg text-normal font-normal text-filter_text">
                                    <option>Nigeria</option>
                                    <option>Cape Verde</option>
                                </select>
                            </div>

                            <div class="w-full mb-3">
                                <label class="font-big text-normal text-filter_text">Filter by Status</label>
                                <select
                                    class="outline-none w-full border border-filterInput bg-transparent h-[44px] px-2 py-1 rounded-lg text-normal font-normal text-filter_text">
                                    <option>Active</option>
                                    <option>Inactive</option>
                                </select>
                            </div>
                            <button
                                class="mt-[1%] w-[67px] h-[40px] bg-transparent rounded-lg text-normal text-primary_color font-big border border-primary_color">
                                Clear
                            </button>
                            <button
                                class="mt-[1%] w-[67px] h-[40px] bg-primary_color rounded-lg text-normal text-natural font-big ml-3">
                                Filter
                            </button>
                        </form>
                    </div>
                </div>

                <div class="flex flex-row items-center max-lg:flex-col max-lg:items-start max-lg:w-full">
                    <div class="relative max-lg:w-full">
                        <img src="../assets/images/search.png" alt="search"
                             class="absolute w-[15px] h-[15px] left-[5%] bottom-[32%]"/>
                        <input type="search" placeholder="search"
                               class="font-normal text-natural text-medium placeholder-natural outline-none  w-[400px] max-lg:w-[100%]  h-[46px] rounded-lg bg-transparent border border-natural px-[10%]"/>
                    </div>
                    <button
                        class="w-[80px] h-[40px] outline-none bg-primary_color text-natural text-normal rounded-lg font-big ml-[25px] max-lg:ml-0 max-lg:mt-2">
                        Search
                    </button>
                </div>
            </div>

            <!-- table 2 section -->
            <section class="border border-table rounded-lg w-[100%] mt-[2%] bg-background_color">
                <div class="overflow-x-auto">
                    <table class="table-auto w-[100%] max-lg:w-[1000px]">
                        <thead class="">
                        <tr class="text-left text-small text-natural font-big">
                            <th class=" px-small py-[1%]">Country</th>
                            <th class=" px-small py-[1%]">State</th>
                            <th class="px-small py-[1%]">Site name</th>
                            <th class="px-small py-[1%]">Email</th>
                            <th class="px-small py-[1%]">Photo</th>
                            <th class="px-small py-[1%]">Status</th>
                            <th class="px-small py-[1%]">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($sites as $site)
                            <tr class="text-normal text-basic font-normal text-natural border border-table border-collapse hover:bg-db">
                                <td class="text-natural px-small py-small">{{$site->state->country->name}}</td>
                                <td class="px-small">{{$site->state->name}}</td>
                                <td class="px-small">
                                    {{$site->name}}
                                </td>
                                <td class="px-small">
                                    {{$site->inspector->email}}
                                </td>
                                <td class="px-small">view image</td>
                                <td class="px-small">
                                    @if($site->status)
                                        <button
                                            class="bg-foundation W-[78px] h-[22px] px-[8px] py-[2px] rounded-full flex flex-row items-center justify-between">
                                            <img src="{{asset('assets/images/white_dot.png')}}" alt="dashboard"
                                                 class="mr-2"/>
                                            <span class="text-natural font-big text-small">Active</span>
                                        </button>
                                    @else
                                        <button
                                            class="bg-inactive W-[78px] h-[22px] px-[8px] py-[2px] rounded-full flex flex-row items-center justify-between">
                                            <img src="../assets/images/white_dot.png" alt="dashboard" class="mr-2"/>
                                            <span class="text-natural font-big text-small">Inactive</span>
                                        </button>
                                    @endif

                                </td>
                                <td class="px-small">
                                    <div class="flex flex-row justify-center">
                                        <a href="{{route('company.sites.edit', ['site' => $site])}}">
                                            <img src="{{asset('assets/images/edit.png')}}" alt="edit"
                                                 class="w-[16px] h-[16px] ml-3 cursor-pointer"/>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr class="text-normal text-basic font-normal text-natural border border-table border-collapse hover:bg-db">
                                <td rowspan="7" class="text-center"> No Data</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
                {{ $sites->links() }}
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

