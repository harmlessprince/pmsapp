@php
    $isSuperAdmin = \Illuminate\Support\Facades\Auth::user()->hasRole(\App\Enums\RoleEnum::SUPER_ADMIN->value);
@endphp
@extends('layouts.app')
@section('title', 'User')
@section('page', 'Admin Management')
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
                    <span class="material-symbols-outlined text-white">person</span>
                </div>
                <div class="ml-[5%]">
                    <h1 class="font-bold text-3xl text-guards">{{$usersCount}}</h1>
                    <span class="font-normal text-sm text-guards">Admin Users</span>
                </div>
            </div>
        </section>

        <!-- table section -->
        <section class="pt-basic_padding">
            <!-- add user -->
            <div class="font-big text-big text-natural mb-2 flex flex-row justify-between">
                <div>Added Users</div>
                @if($isSuperAdmin)
                    <div
                        class="rounded-lg border border-primary_color flex flex-row items-center px-[16px] py-[10px] cursor-pointer">
                        {{-- <img src="{{asset('assets/images/plus.png')}}" class="w-[11px] h-[11px]" alt="plus"/> --}}
                        <span class="material-symbols-outlined text-primary_color">add</span>
                        <a href="{{route('admin.admin.create')}}">
                            <span class="text-primary_color font-big text-normal ml-2"> Add Admin User</span>
                        </a>
                    </div>
                @endif
            </div>
            <x-filter-card :actionUrl="route('admin.admin.index')" :canSearch="true"
                           :searchPlaceholder="'Search by name or phone number'">

            </x-filter-card>


            <!-- table 2 section -->
            <section class="border border-table rounded-lg w-[100%] mt-[2%] bg-background_color">
                <div class="overflow-x-auto">
                    <table class="table-auto w-[100%] max-lg:w-[1000px]">
                        <thead class="">
                        <tr class="text-left text-small text-natural font-big">
                            <th class=" px-small py-[1%]">Name</th>
                            <th class=" px-small py-[1%]">Email</th>
                            <th class="px-small py-[1%]">Role</th>
                            <th class="px-small py-[1%]">Status</th>
                            <th class="px-small py-[1%]">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($users as $user)
                            <tr class="text-normal font-normal border border-table border-x-0 border-b-0 text-natural hover:bg-db">


                                <td class="px-smaller py-small">

                                    {{$user->first_name?? ''}}  {{$user->last_name?? ''}}
                                </td>
                                <td class="px-small">
                                    {{$user->email ?? 'N/A'}}
                                </td>
                                <td class="px-small">
                                    {{ucfirst(str_replace('_', ' ' ,$user->roles[0]->name ))?? 'N/A'}}
                                </td>

                                <td class="px-smaller">
                                    @if((bool)$user->status)
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
                                    @if($isSuperAdmin)
                                        <div class="flex flex-row justify-center">
                                            <a href="{{route('admin.admin.edit', ['admin' => $user->id])}}">

                                                <span
                                                    class="material-symbols-outlined w-[16px] h-[16px] ml-3 cursor-pointer text-natural">edit_square</span>
                                            </a>

                                        </div>
                                    @else
                                        -
                                    @endif
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

