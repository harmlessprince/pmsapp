@php
    $isSuperAdmin = \Illuminate\Support\Facades\Auth::user()->hasRole(\App\Enums\RoleEnum::SUPER_ADMIN->value);
@endphp
@extends('layouts.app')
@section('title', 'Region')
@section('page', 'Region Management')
@section('content')

    <section>
        <section class="flex flex-row justify-start w-[100%] max-lg:mt-[3em]">
            <div
                class="flex flex-row bg-background_color rounded-lg h-[111px] w-[290px] max-small:w-full items-center px-[20px]">
                <div class="w-[44px] h-[44px] bg-guards rounded-lg flex flex-row items-center justify-center">
                    <span class="material-symbols-outlined text-white">person</span>
                </div>
                <div class="ml-[5%]">
                    <h1 class="font-bold text-3xl text-guards">{{$regionsCount}}</h1>
                    <span class="font-normal text-sm text-guards">Total Regions</span>
                </div>
            </div>
        </section>

        <!-- table section -->
        <section class="pt-basic_padding">
            <!-- add user -->
            <div class="font-big text-big text-natural mb-2 flex flex-row justify-between">
                <div>Added Regions</div>

                <div
                    class="rounded-lg border border-primary_color flex flex-row items-center px-[16px] py-[10px] cursor-pointer">
                    {{-- <img src="{{asset('assets/images/plus.png')}}" class="w-[11px] h-[11px]" alt="plus"/> --}}
                    <span class="material-symbols-outlined text-primary_color">add</span>
                    <a href="{{route('company.regions.create')}}">
                        <span class="text-primary_color font-big text-normal ml-2"> Add Region</span>
                    </a>
                </div>

            </div>
            <x-filter-card :actionUrl="route('company.regions.index')" :canSearch="true"
                           :searchPlaceholder="'Search by name'">
                <div class="flex flex-col">
                    <x-input-label for="site_id" :value="__('Site')"/>
                    <x-select-input id="site_id" class="block mt-1 w-full" name="site_id">
                        <option value="">Select a Site</option>
                        @foreach($sites as $item)
                            <option
                                value="{{$item->id}}" {{ request()->query('site_id') == $item->id ? "selected" : '' }}>{{$item->name}}</option>
                        @endforeach
                    </x-select-input>
                </div>
            </x-filter-card>


            <!-- table 2 section -->
            <section class="border border-table rounded-lg w-[100%] mt-[2%] bg-background_color">
                <div class="overflow-x-auto">
                    <table class="table-auto w-[100%] max-lg:w-[1000px]">
                        <thead class="">
                        <tr class="text-left text-small text-natural font-big">
                            <th class=" px-small py-[1%]">Name</th>
                            <th class=" px-small py-[1%]">Email</th>
                            <th class=" px-small py-[1%]">Company</th>
                            <th class=" px-small py-[1%]">No Of Sites</th>
                            <th class="px-small py-[1%]">Status</th>
                            <th class="px-small py-[1%]">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($regions as $region)
                            <tr class="text-normal font-normal border border-table border-x-0 border-b-0 text-natural hover:bg-db">


                                <td class="px-smaller py-small">

                                    {{$region->name ?? ''}}
                                </td>
                                <td class="px-smaller py-small">
                                    {{$region->supervisor->email ?? ''}}
                                </td>
                                <td class="px-small">
                                    {{$region->company->name ?? 'N/A'}}
                                </td>
                                <td class="px-small">
                                    {{$region->sites_count }}
                                </td>
                                <td class="px-smaller">
                                    @if((bool)$region->status)
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
                                <td class="px-small text-center">

                                    <div class="flex flex-row justify-between gap-1">
                                        <a href="{{route('company.regions.edit', ['region' => $region->id])}}">

                                                <span
                                                    class="material-symbols-outlined w-[16px] h-[16px] ml-3 cursor-pointer text-natural">edit_square</span>
                                        </a>

{{--                                        <a href=""--}}
{{--                                           onclick='deleteItem(event, {{"$region->id"}}, "Are you sure you want to delete this region, all related scans, attendances, tags, personnel&#39;s will be deleted as well")'--}}
{{--                                           class="flex">--}}
{{--                                            <span--}}
{{--                                                class="material-symbols-outlined mr-4 w-[24px] h-[24px] text-red-500 cursor-pointer">delete</span>--}}
{{--                                        </a>--}}
{{--                                        <form id="frm-delete-item-{{$region->id}}"--}}
{{--                                              action="{{ route('company.regions.destroy', ['region' => $region]) }}"--}}
{{--                                              style="display: none;" method="POST">--}}
{{--                                            @csrf--}}
{{--                                            @method('delete')--}}

{{--                                        </form>--}}

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
                {{ $regions->links() }}
            </section>
        </section>
    </section>
@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>

        function resetForm() {
            $(".select-2-sites").val('').trigger('change')
            document.getElementById("search-form").reset();
            window.location.replace(location.pathname);
        }

    </script>
@endpush

