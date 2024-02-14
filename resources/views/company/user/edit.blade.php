@extends('layouts.app')
@section('title', 'Dashboard')
@section('page', 'User Management')
@section('content')

    <!-- <div class="font-big text-big text-natural">Add new Site</div> -->
    <div class="font-big text-big text-natural mb-2 flex flex-row justify-between">
        <div>Edit user profile</div>
        <button
            class="font-big text-normal text-primary_color rounded-lg border border-primary_color px-[16px] py-[10px] cursor-pointer bg-transparent">
            Manage User
        </button>
    </div>
    <form class="mt-[2%] w-[100%]">
        <div class="flex flex-row justify-between mb-2  max-lg:flex-col">
            <div class="w-[48%] max-lg:w-full max-lg:mb-2">
                <label class="font-big text-normal text-natural">First name</label>
                <input
                    type="text"
                    class="w-full border border-natural bg-transparent h-11 px-2 py-1 rounded-lg text-natural
                            placeholder-color font-normal text-normal
                            focus:outline-none focus:border-primary_color focus:ring-1 focus:ring-background_color
                            focus:invalid:error focus:invalid:error
                            "
                    placeholder="Name"/>
            </div>
            <div class="w-[48%] max-lg:w-full">
                <label class="font-big text-normal text-natural">Last name</label>
                <input
                    type="email"
                    class="w-full border border-natural bg-transparent h-[44px] px-2 py-1 rounded-lg text-natural
                            placeholder-color font-normal text-normal
                            focus:outline-none focus:border-primary_color focus:ring-1 focus:ring-background_color
                            focus:invalid:error focus:invalid:error
                            "
                    placeholder="Name"/>
            </div>
        </div>

        <div class="w-full mb-3">
            <label class="font-big text-normal text-natural"> Site</label>
            <select
                class="outline-none w-full border border-filterInput bg-transparent h-[44px] px-2 py-1 rounded-lg text-normal font-normal text-filter_text">
                <option>Select Site</option>
                <option>Site type</option>
                <option>Site type</option>
            </select>
        </div>

        <div class="flex flex-row justify-between mb-2 max-lg:flex-col">
            <div class="w-[48%] max-lg:w-full max-lg:mb-2">
                <label class="font-big text-normal text-natural">Phone number</label>
                <input
                    type="text"
                    class="w-full border border-natural bg-transparent h-11 px-2 py-1 rounded-lg text-natural
                            placeholder-color font-normal text-normal
                            focus:outline-none focus:border-primary_color focus:ring-1 focus:ring-background_color
                            focus:invalid:error focus:invalid:error
                            "
                    placeholder=""/>
            </div>
            <div class="w-[48%] max-lg:w-full">
                <label class="font-big text-normal text-natural">Address</label>
                <input
                    type="password"
                    class="w-full border border-natural bg-transparent h-[44px] px-2 py-1 rounded-lg text-natural
                            placeholder-color font-normal text-normal
                            focus:outline-none focus:border-primary_color focus:ring-1 focus:ring-background_color
                            focus:invalid:error focus:invalid:error
                            "
                    placeholder=""/>
            </div>
        </div>

        <div class="flex flex-row justify-between mb-2 max-lg:flex-col">
            <div class="w-[48%] max-lg:w-full max-lg:mb-2">
                <label class="font-big text-normal text-natural">Shift start time</label>
                <input
                    type="time"
                    class="w-full border border-natural bg-transparent h-11 px-2 py-1 rounded-lg text-natural
                            placeholder-color font-normal text-normal
                            focus:outline-none focus:border-primary_color focus:ring-1 focus:ring-background_color
                            focus:invalid:error focus:invalid:error"
                    placeholder=""/>
            </div>
            <div class="w-[48%] max-lg:w-full">
                <label class="font-big text-normal text-natural">Shift end time</label>
                <input
                    type="time"
                    class="w-full border border-natural bg-transparent h-[44px] px-2 py-1 rounded-lg text-natural
                            placeholder-color font-normal text-normal
                            focus:outline-none focus:border-primary_color focus:ring-1 focus:ring-background_color
                            focus:invalid:error focus:invalid:error"
                    placeholder=""/>
            </div>
        </div>

        <div class="flex flex-row justify-between mb-2 max-lg:flex-col">
            <div class="w-[48%] max-lg:w-full max-lg:mb-2">
                <label class="font-big text-normal text-natural">Normal rate per hour</label>
                <input
                    type="text"
                    class="w-full border border-natural bg-transparent h-11 px-2 py-1 rounded-lg text-natural
                            placeholder-color font-normal text-normal
                            focus:outline-none focus:border-primary_color focus:ring-1 focus:ring-background_color
                            focus:invalid:error focus:invalid:error
                            "
                    placeholder=""/>
            </div>
            <div class="w-[48%] max-lg:w-full">
                <label class="font-big text-normal text-natural">Sunday rate per hour</label>
                <input
                    type="text"
                    class="w-full border border-natural bg-transparent h-[44px] px-2 py-1 rounded-lg text-natural
                            placeholder-color font-normal text-normal
                            focus:outline-none focus:border-primary_color focus:ring-1 focus:ring-background_color
                            focus:invalid:error focus:invalid:error
                            "
                    placeholder=""/>
            </div>
        </div>

        <div class="flex flex-row justify-between mb-2 max-lg:flex-col">
            <div class="w-[48%] max-lg:w-full max-lg:mb-2">
                <label class="font-big text-normal text-natural">Holiday rate per hour</label>
                <input
                    type="text"
                    class="w-full border border-natural bg-transparent h-11 px-2 py-1 rounded-lg text-natural
                            placeholder-color font-normal text-normal
                            focus:outline-none focus:border-primary_color focus:ring-1 focus:ring-background_color
                            focus:invalid:error focus:invalid:error
                            "
                    placeholder=""/>
            </div>
            <div class="w-[48%] max-lg:w-full">
                <label class="font-big text-normal text-natural">Number of night shift</label>
                <input
                    type="text"
                    class="w-full border border-natural bg-transparent h-[44px] px-2 py-1 rounded-lg text-natural
                            placeholder-color font-normal text-normal
                            focus:outline-none focus:border-primary_color focus:ring-1 focus:ring-background_color
                            focus:invalid:error focus:invalid:error
                            "
                    placeholder=""/>
            </div>
        </div>

        <div class="w-full  mb-2">
            <label class="font-big text-normal text-natural">Night Shift allowance</label>
            <input
                type="text"
                class="w-full border border-natural bg-transparent h-[44px] px-2 py-1 rounded-lg text-natural
                        placeholder-color font-normal text-normal
                        focus:outline-none focus:border-primary_color focus:ring-1 focus:ring-background_color
                        focus:invalid:error focus:invalid:error
                        "
                placeholder=""/>
        </div>

        <div class="w-full  mb-2">
            <label class="font-big text-normal text-natural">Photo</label>
            <input
                type="file"
                class="w-full border border-natural bg-transparent h-[44px] px-2 py-1 rounded-lg text-natural
                        placeholder-color font-normal text-normal
                        focus:outline-none focus:border-primary_color focus:ring-1 focus:ring-background_color
                        focus:invalid:error focus:invalid:error
                        "
                placeholder=""/>
        </div>

        <button class="mt-[1%] w-[60px] h-[40px] bg-primary_color rounded-lg text-normal text-natural font-big">update
        </button>
    </form>

@endsection
