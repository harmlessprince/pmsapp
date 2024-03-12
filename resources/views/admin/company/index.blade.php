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
                    <h1 class="font-bold text-3xl text-primary_color">{{$countCompany}}</h1>
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
                    <span class="material-symbols-outlined text-primary_color">add</span>
                    <a href="{{route('admin.companies.create')}}">
                        <span class="text-primary_color font-big text-normal ml-2"> Add New Company</span>
                    </a>
                </div>
            </div>
            <x-filter-card :actionUrl="route('admin.companies.index')" :canSearch="true"
                           :searchPlaceholder="'Search by name or phone number'">
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
                        @forelse($companies as $company)
                            <tr class="text-normal font-normal border border-table border-x-0 border-b-0 text-natural hover:bg-db">
                                <td class="text-natural px-smaller py-small">
                                    {{$company->state->name  ?? 'N/A'}}
                                </td>

                                <td class="px-smaller">
                                    {{$company->display_name}}
                                </td>

                                <td class="px-smaller">
                                    {{$company->owner->email}}
                                </td>

                                <td class="px-smaller">
                                    {{$company->owner->first_name}} {{$company->owner->last_name}}
                                </td>
                                <td class="px-smaller">
                                    {{$company->maximum_number_of_tags}}
                                </td>

                                <td class="px-smaller">
                                    @if((bool)$company->status)
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

                                <td class="px-small text-right">
                                    <div class="flex flex-row justify-center"> -
                                        <a href="{{route('admin.companies.edit', ['company' => $company->id])}}">

                                        <span
                                            class="material-symbols-outlined w-[16px] h-[16px] ml-3 cursor-pointer text-natural">edit_square</span>
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
                 {{ $companies->links() }}
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
