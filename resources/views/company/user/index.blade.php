@extends('layouts.app')
@section('title', 'User')
@section('page', 'User Management')
@push('header-scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
@endpush
@section('content')

    <section>
        <section class="flex flex-row justify-start w-[100%] max-lg:mt-[3em]">
            <div
                class="flex flex-row bg-background_color rounded-lg h-[111px] w-[290px] max-small:w-full items-center px-[20px]">
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
        <section class="pt-basic_padding">
            <!-- add site -->
            <div class="font-big text-big text-natural mb-2 flex flex-row justify-between">
                <div>Added Personnel</div>
                <div
                    class="rounded-lg border border-primary_color flex flex-row items-center px-[16px] py-[10px] cursor-pointer">
                    <img src="{{asset('assets/images/plus.png')}}" class="w-[11px] h-[11px]" alt="plus"/>
                    <a href="{{route('company.users.create')}}">
                        <span class="text-primary_color font-big text-normal ml-2"> Add Personnel</span>
                    </a>
                </div>
            </div>
            <x-filter-card :actionUrl="route('company.users.index')" :canSearch="true"
                           :searchPlaceholder="'Search by name or phone number'">
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
                    <x-input-label for="state_id" :value="__('State')"/>
                    <x-select-input id="state_id" class="block mt-1 w-full"
                                    name="state_id">
                        <option value="">Select State</option>
                        @foreach($states as $state)
                            <option
                                value="{{$state->id}}" {{ request()->query('state_id') == $state->id ? "selected" : '' }}>{{$state->name}}</option>
                        @endforeach
                    </x-select-input>
                </div>
            </x-filter-card>


            <!-- table 2 section -->
            <section class="border border-table rounded-lg w-[100%] mt-[2%] bg-background_color">
                <div class="overflow-x-auto">
                    <table class="table-fixed w-[100%] max-lg:w-[1000px]">
                        <thead class="">
                        <tr class="text-left text-small text-natural font-big">
                            <th class=" px-small py-[1%] w-[20%]">Name</th>
                            <th class="px-small py-[1%] w-[15%]">Phone number</th>
                            <th class="px-small py-[1%] w-[10%]">Country</th>
                            <th class="px-small py-[1%] w-[10%]">State</th>
                            <th class="px-small py-[1%] w-[20%]">Postal Address</th>
                            <th class="px-small py-[1%] w-[12%]">Site</th>
                            <th class="text-right px-small py-[1%] w-[8%]">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($users as $user)
                            <tr class="text-normal font-normal border border-table border-collapse text-natural hover:bg-db">

                                <td class="text-natural px-small py-small flex flex-row items-center">
                                    <div class="w-[40px] h-[40px] rounded-full">
                                        <img src="{{$user->profile_image}}" alt="Profile Image"
                                             class="rounded-full w-[40px] h-[40px]"
                                             data-modal-target="imageViewModalElement"
                                             data-modal-toggle="imageViewModalElement"
                                             onclick='showImageModal("{{$user->profile_image}}")'
                                        >
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
                                    <div class="flex flex-row justify-end">
                                        <a href="{{route('company.users.edit', ['user' => $user->id])}}">
                                            <img src="{{asset('assets/images/edit.png')}}" alt="edit"
                                                 class="w-[16px] h-[16px] ml-3 cursor-pointer"/>
                                        </a>

                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr class="text-normal font-normal border border-table border-collapse text-natural hover:bg-db">
                                <td class="text-center" colspan="5">No Data</td>
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

        function exportUsers() {
            console.log("export button clicked")
        }

        function resetForm() {
            $(".site").val('').trigger('change')
            document.getElementById("search-form").reset();
            window.location.replace(location.pathname);
        }
    </script>
@endpush

