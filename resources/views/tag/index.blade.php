@extends('layouts.app')
@section('title', 'Tags')
@section('content')

    <section>
        <section class="flex flex-row justify-between w-[100%] max-lg:mt-[15%]">
            <div
                class="flex flex-row  bg-background_color rounded-lg h-[111px] w-[290px] items-center px-[20px] max-lg:mx-auto">
                <div class="w-[44px] h-[44px] bg-tags rounded-lg flex flex-row items-center justify-center">
                    <span class="material-symbols-outlined text-white">tag</span>
                </div>
                <div class="ml-[5%]">
                    <h1 class="font-bold text-3xl text-tags">12233</h1>
                    <span class="font-normal text-sm text-tags">Tags</span>
                </div>
            </div>
        </section>

        <!-- table section -->
        <section class="pt-basic_padding">
            <!-- add site -->
            <div class="font-big text-big text-natural mb-2 flex flex-row justify-between">
                <div>Added Tags</div>
                <div
                    class="rounded-lg border border-primary_color flex flex-row items-center px-[16px] py-[10px] cursor-pointer">
                    <img src="{{asset('assets/images/plus.png')}}" class="w-[11px] h-[11px]" alt="plus"/>
                    <a href="{{route('admin.tags.create')}}">
                        <span class="text-primary_color font-big text-normal ml-2"> Add New Tag</span>
                    </a>
                </div>
            </div>

            <section>
                <x-filter-card :actionUrl="route('admin.tags.index')" :hasTable="false" :canSearch="true"
                               :searchPlaceholder="'Search by tag name, code, comment'">
                    <div class="flex flex-col">
                        <x-input-label for="site_id" :value="__('Select Company')"/>
                        <x-select-input id="site_id" class="block mt-1 w-full" name="site_id">
                            <option value="">Select Company</option>

                        </x-select-input>
                    </div>
                    <div class="flex flex-col">
                        <x-input-label for="site_id" :value="__('Select site')"/>
                        <x-select-input id="site_id" class="block mt-1 w-full" name="site_id">
                            <option value="">Select Site</option>

                        </x-select-input>
                    </div>

                </x-filter-card>
            </section>

            <!-- table 2 section -->
            <section class="border border-table rounded-lg w-[100%] mt-[2%] bg-background_color">
                <div class="overflow-x-auto">
                    <table class="table-auto w-[100%] max-lg:w-[1000px]">
                        <thead class="">
                        <tr class="text-left text-small text-natural font-big">
                            <th class=" px-small py-[1%]">Company</th>
                            <th class="px-small py-[1%]">Site name</th>
                            <th class="px-small py-[1%]">Tag Name</th>
                            <th class="px-small py-[1%]">Code</th>
                            <th class="px-small py-[1%]">Comments</th>
                            <th class="px-small py-[1%]">Tag</th>
                            <th class="px-small py-[1%]">Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        <tr class="text-normal font-normal text-natural border border-table border-collapse hover:bg-db">

                        </tr>

                        </tbody>
                    </table>
                </div>
                {{ $tags->links() }}
            </section>
        </section>
    </section>
@endsection
