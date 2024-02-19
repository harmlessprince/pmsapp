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
                <div class="w-[44px] h-[44px] bg-blue-500 rounded-lg flex flex-row items-center justify-center">
                    <span class="material-symbols-outlined text-white">home</span>
                </div>
                <div class="ml-[5%]">
                    <h1 class="font-bold text-3xl text-blue-500">{{$countOfSites}}</h1>
                    <span class="font-normal text-sm text-blue-500">Sites</span>
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

            <x-filter-card>
                <form class="" method="GET" action="{{route('company.sites.index')}}" id="search-form-1">
                    <div class="relative mb-10 w-full flex  items-center justify-between rounded-md">
                        <svg class="absolute left-2 block h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                             width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                             stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="11" cy="11" r="8" class=""></circle>
                            <line x1="21" y1="21" x2="16.65" y2="16.65" class=""></line>
                        </svg>
                        <x-text-input id="search" class="h-12 w-full cursor-text bg-db py-4 pr-40 pl-12" type="text"
                                      name="search" placeholder="Search by name, type, manufacturer, etc"/>
                    </div>

                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                        <div class="flex flex-col">
                            <x-input-label for="state_id" :value="__('Select State')"/>
                            <x-select-input id="state_id" class="block mt-1 w-full" name="state_id">
                                <option value="">Select State</option>
                                @foreach($states as $state)
                                    <option
                                        value="{{$state->id}}" {{ request()->query('state_id') == $state->id ? "selected" : '' }}>{{$state->name}}</option>
                                @endforeach
                            </x-select-input>
                        </div>
                        <div class="flex flex-col">
                            <x-input-label for="status" :value="__('Select Status')"/>
                            <x-select-input id="status" class="block mt-1 w-full" name="status">
                                <option value="">Select Status</option>
                                <option value="active" {{ request()->query('status') == 'active' ? "selected" : '' }}>
                                    Active
                                </option>
                                <option value="inactive" {{ request()->query('status') == 'inactive' ? "selected" : '' }}>
                                    Inactive
                                </option>
                            </x-select-input>
                        </div>
                    </div>

                    <div class="mt-6 grid w-full grid-cols-2 justify-end space-x-4 md:flex">
                        <x-secondary-button type="reset" class="px-8 py-2" onclick="resetForm()">Reset</x-secondary-button>
                        <x-primary-button class="px-8 py-2" type="submit">Search</x-primary-button>
                    </div>
                </form>
            </x-filter-card>

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
                                            <img src="{{asset('assets/images/white_dot.png')}}" alt="dashboard"
                                                 class="mr-2"/>
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
                                <td colspan="7" class="text-center"> No Data</td>
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
            $("#state_id").val('').trigger('change')
            $("#status").val('').trigger('change')

            document.getElementById("search-form-1").reset();
            // document.getElementById("search-form-2").reset();
            window.location.replace(location.pathname);
        }
    </script>
@endpush

