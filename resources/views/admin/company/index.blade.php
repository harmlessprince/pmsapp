@extends('layouts.app')
@section('title', 'Company')
@section('page', 'Company')
@push('header-scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
@endpush
@section('content')

    <section>
        <section class="flex flex-row justify-between w-[100%] max-lg:mt-[15%]">
            <div
                class="flex flex-row bg-background_color rounded-lg h-[111px] w-[290px] items-center px-[20px] max-lg:mx-auto">
                <div class="w-[44px] h-[44px] bg-primary_color rounded-lg flex flex-row items-center justify-center">
                    <span class="material-symbols-outlined text-white">account_balance</span>
                </div>
                <div class="ml-[5%]">
                    <h1 class="font-bold text-3xl text-primary_color">74</h1>
                    <span class="font-normal text-sm text-primary_color">Companies</span>
                </div>
            </div>
        </section>

        <!-- table section -->
        <section class="pt-basic_padding">
            <!-- add user -->
            <div class="font-big text-big text-natural mb-2 flex flex-row justify-between">
                <div>Added Companies</div>
                <div
                    class="rounded-lg border border-primary_color flex flex-row items-center px-[16px] py-[10px] cursor-pointer">
                    {{-- <img src="{{asset('assets/images/plus.png')}}" class="w-[11px] h-[11px]" alt="plus"/> --}}
                    <span class="material-symbols-outlined text-primary_color">add</span>
                    <a href="{{route('admin.companies.create')}}">
                        <span class="text-primary_color font-big text-normal ml-2"> Add New Company</span>
                    </a>
                </div>
            </div>
            <x-filter-card :actionUrl="route('company.users.index')" :canSearch="true" :searchPlaceholder="'Search by name or phone number'">

                <div class="flex flex-col">
                    <x-input-label for="site_id" :value="__('Site')" class="text-white"/>
                    <x-select-input id="site_id" class="block w-full" name="site_id">
                        <option class="" value="">All site</option>
                    </x-select-input>
                </div>
            </x-filter-card>


            <!-- table 2 section -->
            <section class="border border-table rounded-lg w-[100%] mt-[2%] bg-background_color">
                <div class="overflow-x-auto">
                    <table class="table-fixed w-[100%] max-lg:w-[1000px]">
                        <thead class="">
                        <tr class="text-left text-small text-natural font-big">
                            <th class="px-smaller py-[1%] w-[13%]">City</th>
                            <th class=" px-smaller py-[1%] w-[15%]">Display name</th>
                            <th class="px-smaller py-[1%] w-[20%]">Email</th>
                            <th class="px-smaller py-[1%]  w-[25%]">Name</th>
                            <th class="px-smaller py-[1%]">Tags</th>
                            <th class="px-smaller py-[1%]">Status</th>
                            <th class="px-smaller py-[1%] text-right">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        {{-- @forelse($users as $user) --}}
                            <tr class="text-normal font-normal border border-table border-x-0 border-b-0 text-natural hover:bg-db">
                                <td class="text-natural px-smaller py-small">
                                   kaduna
                                </td>

                                <td class="px-smaller">
                                    Display name
                                </td>

                                <td class="px-smaller">
                                   example@gmail.com
                                </td>
                                
                                <td class="px-smaller">
                                fun way club
                                </td>
                                <td class="px-smaller">
                                   10
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
                                    {{-- <div class="flex flex-row justify-center"> --}}
                                        {{-- <a href="{{route('company.users.edit', ['user' => $user->id])}}"> --}}
                                            <a href="#">
                                            {{-- <img src="{{asset('assets/images/edit.png')}}" alt="edit"
                                                 class="w-[16px] h-[16px] ml-3 cursor-pointer"/> --}}
                                        <span class="material-symbols-outlined w-[16px] h-[16px] ml-3 cursor-pointer text-natural">edit_square</span>
                                        </a>

                                    {{-- </div> --}}
                                </td>
                            </tr>

                            <tr class="text-normal font-normal border border-table border-x-0 border-b-0 text-natural hover:bg-db">
                                <td class="text-natural px-smaller py-small">
                                   kaduna
                                </td>

                                <td class="px-smaller">
                                    Display name
                                </td>

                                <td class="px-smaller">
                                   example@gmail.com
                                </td>
                                
                                <td class="px-smaller">
                                fun way club
                                </td>
                                <td class="px-smaller">
                                   10
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
                                    {{-- <div class="flex flex-row justify-center"> --}}
                                        {{-- <a href="{{route('company.users.edit', ['user' => $user->id])}}"> --}}
                                            <a href="#">
                                            {{-- <img src="{{asset('assets/images/edit.png')}}" alt="edit"
                                                 class="w-[16px] h-[16px] ml-3 cursor-pointer"/> --}}
                                        <span class="material-symbols-outlined w-[16px] h-[16px] ml-3 cursor-pointer text-natural">edit_square</span>
                                        </a>

                                    {{-- </div> --}}
                                </td>
                            </tr>
                        {{-- @empty
                            <tr class="text-normal font-normal border border-table border-collapse text-natural hover:bg-db">
                                <td class="text-center" colspan="5">No Data</td>
                            </tr>
                        @endforelse --}}


                        </tbody>
                    </table>
                </div>
                {{-- {{ $users->links() }} --}}
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
