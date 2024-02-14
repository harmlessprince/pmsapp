@extends('layouts.app')
@section('title', 'Tag')
@section('page', 'Tag Management')
@section('content')

    <div class="font-big text-big text-natural mb-2 flex flex-row justify-between">
        <div>Add new Tags</div>
        <button class="font-big text-normal text-primary_color rounded-lg border border-primary_color px-[16px] py-[10px] cursor-pointer bg-transparent">Manage Tags</button>
    </div>
    <form class="mt-[2%] w-[100%]">
        <div class="flex flex-row justify-between mb-2 max-lg:flex-col">
            <div class="w-[45%] max-lg:w-full mb-2">
                <label class="font-big text-normal text-natural">Tag name</label>
                <input
                    type="text"
                    class="text-natural w-full border border-natural bg-transparent h-11 px-2 py-1 rounded-lg
                            placeholder-placeholder_color font-normal text-normal
                            focus:outline-none focus:border-primary_color focus:ring-1 focus:ring-background_color
                            focus:invalid:error focus:invalid:error
                            "
                    placeholder="Enter Tag name" />
            </div>
            <div class="w-[45%] max-lg:w-full">
                <label class="font-big text-normal text-natural">Select site</label>
                <select class="outline-none w-full border border-natural bg-db h-[44px] px-2 py-1 rounded-lg text-white font-normal text-natural">
                    <option class=""></option>
                    <option>ikoyi</option>
                    <option>Lagos</option>
                    <option>Abuja</option>
                </select>

            </div>
        </div>

        <div class="w-full  mb-2">
            <label class="font-big text-normal text-natural">Tag Type</label>
            <select class="outline-none w-full border border-natural bg-db h-[44px] px-2 py-1 rounded-lg text-white font-normal text-natural">
                <option class=""></option>
                <option>tag type</option>
                <option>tag type</option>
                <option>tag type</option>
            </select>
        </div>

        <div class="w-full  mb-2">
            <label class="font-big text-normal text-natural">Comments</label>
            <textarea placeholder="Comments.."
                      class="outline-none w-[100%] h-[150px] placeholder-placeholder_color border border-natural bg-transparent px-2 py-1 rounded-lg text-normal"></textarea>
        </div>



        <div class="w-full mb-2">
            <label class="font-big text-normal text-natural">Search Location</label>
            <input type="text" class="text-natural w-full border border-natural bg-transparent h-[44px] px-2 py-1 rounded-lg text-normal
                        placeholder-color font-normal
                        focus:outline-none focus:border-primary_color focus:ring-1 focus:ring-background_color
                        focus:invalid:error focus:invalid:error
                        "
                   placeholder=""/>
        </div>

        <div class="flex flex-row justify-between mb-2 max-lg:flex-col">
            <div class="w-[45%] max-lg:w-full max-lg:mb-2">
                <label class="font-big text-normal text-natural">Longitude</label>
                <input
                    type="text"
                    class="text-natural w-full border border-natural bg-transparent h-11 px-2 py-1 rounded-lg text-normal
                            placeholder-color font-normal
                            focus:outline-none focus:border-primary_color focus:ring-1 focus:ring-background_color
                            focus:invalid:error focus:invalid:error"
                    placeholder="" />
            </div>
            <div class="w-[45%] max-lg:w-full">
                <label class="font-big text-normal text-natural">Latitude</label>
                <input
                    type="text"
                    class="w-full border border-natural bg-transparent h-[44px] px-2 py-1 rounded-lg text-white
                            placeholder-color font-normal text-base
                            focus:outline-none focus:border-primary_color focus:ring-1 focus:ring-background_color
                            focus:invalid:error focus:invalid:error"
                    placeholder="" />
            </div>
        </div>
        <button class="mt-[1%] w-[60px] h-[40px] bg-primary_color rounded-lg text-normal text-natural font-big">Add</button>
    </form>

@endsection
