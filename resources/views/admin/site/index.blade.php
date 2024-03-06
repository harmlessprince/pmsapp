@extends('layouts.app')
@section('title', 'Site management')
@section('page', 'Site management')
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
                    <span class="material-symbols-outlined text-white">pin_drop</span>
                </div>
                <div class="ml-[5%]">
                    <h1 class="font-bold text-3xl text-site">740</h1>
                    <span class="font-normal text-sm text-site">Sites</span>
                </div>
            </div>
        </section>

        <!-- table section -->
        <section class="pt-basic_padding">
            <!-- add user -->
            <div class="font-big text-big text-natural mb-2 flex flex-row justify-between">
                <div>Added Sites</div>
                <div
                    class="rounded-lg border border-primary_color flex flex-row items-center px-[16px] py-[10px] cursor-pointer">
                    {{-- <img src="{{asset('assets/images/plus.png')}}" class="w-[11px] h-[11px]" alt="plus"/> --}}
                    <span class="material-symbols-outlined text-primary_color">add</span>
                    <a href="{{route('admin.sites.create')}}">
                        <span class="text-primary_color font-big text-normal ml-2"> Add New Site</span>
                    </a>
                </div>
            </div>
            <x-filter-card :actionUrl="route('company.users.index')" :canSearch="true" :searchPlaceholder="'Search by name or phone number'">
                <div class="flex flex-col">
                    <x-input-label for="site_id" :value="__('Select Company')"/>
                    <x-select-input id="site_id" class="block mt-1 w-full" name="site_id">
                        <option value="">Select Company</option>

                    </x-select-input>
                </div>

                {{-- <div class="flex flex-col">
                    <x-input-label for="site_id" :value="__('Site')" class="text-white"/>
                    <x-select-input id="site_id" class="block w-full" name="site_id">
                        <option class="" value="">All site</option> --}}
                        {{-- @foreach($sites as $site)
                            <option>
                                all site
                            </option>
                        @endforeach --}}
                    {{-- </x-select-input>
                </div> --}}
            </x-filter-card>


            <!-- table 2 section -->
            <section class="border border-table rounded-lg w-[100%] mt-[2%] bg-background_color">
                <div class="overflow-x-auto">
                    <table class="table-fixed w-[100%] max-lg:w-[1000px]">
                        <thead class="">
                        <tr class="text-left text-small text-natural font-big">
                            <th class="px-smaller py-[1%] w-[13%]">Company</th>
                            <th class=" px-smaller py-[1%] w-[13%]">Site name</th>
                            <th class="px-smaller py-[1%] w-[20%]">Email</th>
                            <th class="px-smaller py-[1%]  w-[25%]">Address</th>
                            <th class="px-smaller py-[1%]">Photo</th>
                            <th class="px-smaller py-[1%]">Status</th>
                            <th class="px-smaller py-[1%] text-right">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        {{-- @forelse($users as $user) --}}
                            <tr class="text-normal font-normal border border-table border-x-0 border-b-0 text-natural hover:bg-db">
                                <td class="text-natural px-smaller py-small">
                                   Company name
                                </td>

                                <td class="px-smaller">
                                    TCN
                                </td>

                                <td class="px-smaller">
                                   example@gmail.com
                                </td>
                                
                                <td class="px-smaller">
                               Close up, yaba lagos
                                </td>
                                <td class="px-smaller">
                                    view image
                                </td>

                                <td class="px-smaller">
                                <button
                                class="bg-foundation W-[78px] h-[22px] px-[8px] py-[2px] rounded-full flex flex-row items-center justify-between">
                                <img src="{{asset('assets/images/white_dot.png')}}" alt="dashboard"
                                     class="mr-2"/>
                                <span class="text-natural font-big text-small">Active</span>
                            </button>
                        </td>

                                <td class="px-small text-right">                             
                                            <a href="#">
                                        <span class="material-symbols-outlined w-[16px] h-[16px] ml-3 cursor-pointer text-natural">edit_square</span>
                                        </a>
                                </td>
                            </tr>

                            <tr class="text-normal font-normal border border-table border-x-0 border-b-0 text-natural hover:bg-db">
                                <td class="text-natural px-smaller py-small">
                                    Company name
                                 </td>
 
                                 <td class="px-smaller">
                                     TCN
                                 </td>
 
                                 <td class="px-smaller">
                                    example@gmail.com
                                 </td>
                                 
                                 <td class="px-smaller">
                                Close up, yaba lagos
                                 </td>
                                 <td class="px-smaller">
                                     view image
                                 </td>

                                <td class="px-smaller">
                                    <button
                                    class="bg-inactive W-[78px] h-[22px] px-[8px] py-[2px] rounded-full flex flex-row items-center justify-between">
                                    <img src="{{asset('assets/images/white_dot.png')}}" alt="dashboard"
                                         class="mr-2"/>
                                    <span class="text-natural font-big text-small">Inactive</span>
                                </button>
                        </td>

                                <td class="px-small text-right">
                                    
                                            <a href="#">
                                         
                                        <span class="material-symbols-outlined w-[16px] h-[16px] ml-3 cursor-pointer text-natural">edit_square</span>
                                        </a>
                                </td>
                            </tr>


                        </tbody>
                    </table>
                </div>
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