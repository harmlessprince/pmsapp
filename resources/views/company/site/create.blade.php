@extends('layouts.app')
@section('title', 'Site Management')
@section('page', 'Site Management')
@section('content')

    <div class="font-big text-big text-natural mb-2 flex flex-row justify-between">
        <div>Add new Site</div>
        <button class="font-big text-normal text-primary_color rounded-lg border border-primary_color px-[16px] py-[10px] cursor-pointer bg-transparent">Manage Sites</button>
    </div>
    <form class="mt-[2%] w-[100%]">
        <div class="flex flex-row justify-between mb-2 max-lg:flex-col">
            <div class="w-[48%] max-lg:w-[100%] max-lg:mb-2">
                <label class="font-big text-normal text-natural">Site name</label>
                <input
                    type="text"
                    class="w-full border border-natural bg-transparent h-11 px-2 py-1 rounded-lg text-natural
                            placeholder-color font-normal text-normal
                            focus:outline-none focus:border-primary_color focus:ring-1 focus:ring-background_color
                            focus:invalid:error focus:invalid:error
                            "
                    placeholder="" />
            </div>
            <div class="w-[48%] max-lg:w-[100%]">
                <label class="font-big text-normal text-natural">Email</label>
                <input
                    type="email"
                    class="w-full border border-natural bg-transparent h-[44px] px-2 py-1 rounded-lg text-natural
                            placeholder-color font-normal text-normal
                            focus:outline-none focus:border-primary_color focus:ring-1 focus:ring-background_color
                            focus:invalid:error focus:invalid:error
                            "
                    placeholder="" />
            </div>
        </div>

        <div class="w-full  mb-2">
            <label class="font-big text-normal text-natural">Username</label>
            <input
                type="text"
                class="w-full border border-natural bg-transparent h-[44px] px-2 py-1 rounded-lg text-natural
                        placeholder-color font-normal text-normal
                        focus:outline-none focus:border-primary_color focus:ring-1 focus:ring-background_color
                        focus:invalid:error focus:invalid:error
                        "
                placeholder="" />
        </div>

        <div class="flex flex-row justify-between mb-2 max-lg:flex-col">
            <div class="w-[48%] max-lg:w-[100%]  mb-2">
                <label class="font-big text-normal text-natural">Password</label>
                <input
                    type="text"
                    class="w-full border border-natural bg-transparent h-11 px-2 py-1 rounded-lg text-natural
                            placeholder-color font-normal text-normal
                            focus:outline-none focus:border-primary_color focus:ring-1 focus:ring-background_color
                            focus:invalid:error focus:invalid:error
                            "
                    placeholder="" />
            </div>
            <div class="w-[48%] max-lg:w-[100%]">
                <label class="font-big text-normal text-natural">Confirm Password</label>
                <input
                    type="password"
                    class="w-full border border-natural bg-transparent h-[44px] px-2 py-1 rounded-lg text-natural
                            placeholder-color font-normal text-normal
                            focus:outline-none focus:border-primary_color focus:ring-1 focus:ring-background_color
                            focus:invalid:error focus:invalid:error
                            "
                    placeholder="" />
            </div>
        </div>

        <div class="w-full  mb-2">
            <label class="font-big text-normal text-natural">Address</label>
            <input
                type="text"
                class="w-full border border-natural bg-transparent h-[44px] px-2 py-1 rounded-lg text-natural
                        placeholder-color font-normal text-normal
                        focus:outline-none focus:border-primary_color focus:ring-1 focus:ring-background_color
                        focus:invalid:error focus:invalid:error
                        "
                placeholder="" />
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
                placeholder="" />
        </div>

        <div class="flex flex-row justify-between mb-2 max-lg:flex-col">
            <div class="w-[48%] max-lg:w-[100%]  max-lg:mb-2">
                <label class="font-big text-normal text-natural">Shift start time</label>
                <input
                    type="time"
                    class="w-full border border-natural bg-transparent h-11 px-2 py-1 rounded-lg text-natural
                            placeholder-color font-normal text-normal
                            focus:outline-none focus:border-primary_color focus:ring-1 focus:ring-background_color
                            focus:invalid:error focus:invalid:error"
                    placeholder="" />
            </div>
            <div class="w-[48%]  max-lg:w-[100%]">
                <label class="font-big text-normal text-natural">Shift end time</label>
                <input
                    type="time"
                    class="w-full border border-natural bg-transparent h-[44px] px-2 py-1 rounded-lg text-natural
                            placeholder-color font-normal text-normal
                            focus:outline-none focus:border-primary_color focus:ring-1 focus:ring-background_color
                            focus:invalid:error focus:invalid:error"
                    placeholder="" />
            </div>
        </div>

        <div class="flex flex-row justify-between mb-2 max-lg:flex-col">
            <div class="w-[48%] max-lg:w-full max-lg:mb-2">
                <label class="font-big text-normal text-natural">Max tag</label>
                <input
                    type="text"
                    class="w-full border border-natural bg-transparent h-11 px-2 py-1 rounded-lg text-natural
                            placeholder-color font-normal text-normal
                            focus:outline-none focus:border-primary_color focus:ring-1 focus:ring-background_color
                            focus:invalid:error focus:invalid:error
                            "
                    placeholder="" />
            </div>
            <div class="w-[48%] max-lg:w-full">
                <label class="font-big text-normal text-natural">No of rounds</label>
                <input
                    type="number"
                    class="w-full border border-natural bg-transparent h-[44px] px-2 py-1 rounded-lg text-natural
                            placeholder-color font-normal text-normal
                            focus:outline-none focus:border-primary_color focus:ring-1 focus:ring-background_color
                            focus:invalid:error focus:invalid:error
                            "
                    placeholder="" />
            </div>
        </div>

        <div class="w-full mb-2">
            <label class="font-big text-normal text-natural">Logout Pin</label>
            <input
                type="number"
                class="w-full border border-natural bg-transparent h-[44px] px-2 py-1 rounded-lg text-natural
                        placeholder-color font-normal text-normal
                        focus:outline-none focus:border-primary_color focus:ring-1 focus:ring-background_color
                        focus:invalid:error focus:invalid:error
                        "
                placeholder="" />
        </div>

        <div class="flex flex-row justify-between mb-2 max-lg:flex-col">
            <div class="w-[48%] max-lg:w-full max-lg:mb-2">
                <label class="font-big text-normal text-natural">Longitude</label>
                <input
                    type="text"
                    class="w-full border border-natural bg-transparent h-11 px-2 py-1 rounded-lg text-natural
                            placeholder-color font-normal text-normal
                            focus:outline-none focus:border-primary_color focus:ring-1 focus:ring-background_color
                            focus:invalid:error focus:invalid:error"
                    placeholder="" />
            </div>
            <div class="w-[48%] max-lg:w-full">
                <label class="font-big text-normal text-natural">Latitude</label>
                <input
                    type="text"
                    class="w-full border border-natural bg-transparent h-[44px] px-2 py-1 rounded-lg text-natural
                            placeholder-color font-normal text-normal
                            focus:outline-none focus:border-primary_color focus:ring-1 focus:ring-background_color
                            focus:invalid:error focus:invalid:error"
                    placeholder="" />
            </div>
        </div>

        <div class="w-full mb-2">
            <label class="font-big text-normal text-natural">Search Location</label>
            <input
                type="text"
                class="w-full border border-natural bg-transparent h-[44px] px-2 py-1 rounded-lg text-natural
                        placeholder-color font-normal text-normal
                        focus:outline-none focus:border-primary_color focus:ring-1 focus:ring-background_color
                        focus:invalid:error focus:invalid:error
                        "
                placeholder="" />
        </div>


        <button class="mt-[1%] w-[60px] h-[40px] bg-primary_color rounded-lg text-normal text-natural font-big">Add</button>
    </form>

@endsection
