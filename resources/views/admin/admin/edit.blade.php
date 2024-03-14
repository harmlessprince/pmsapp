@extends('layouts.app')
@section('title', 'Create Admin')
@section('page', 'Admin Management')
@section('content')

    @include('admin.admin.change_password_modal', ['admin' => $admin])
    <div class="font-big text-big text-natural mb-2 flex flex-row justify-between">
        <div>Edit Admin ({{$admin->first_name}} {{$admin->last_name}})</div>

        <button
            class="font-big text-normal text-white rounded-lg border-none bg-red-700 px-[16px] py-[10px] cursor-pointer focus:outline-none text-white"
            id="show_change_password_dialog"
            data-modal-target="changePasswordModal"
            data-modal-toggle="changePasswordModal"
        >
            Change Password
        </button>
        <a
            class="font-big text-normal text-primary_color rounded-lg border border-primary_color px-[16px] py-[10px] cursor-pointer bg-transparent"
            href="{{route('admin.admin.index')}}"
        >
            Manage Admins
        </a>
    </div>

    <form class="mt-[2%] w-[100%]" action="{{route('admin.admin.update',  ['admin' => $admin])}}" method="POST">
        @csrf
        @method('patch')
        <div class="grid gap-6 mb-6 md:grid-cols-2">
            <div class="flex flex-col">
                <x-input-label for="first_name" :value="__('First Name')"/>
                <x-text-input id="first_name" class="block mt-1 w-full" type="text" name="first_name"
                              :value="$admin->first_name"
                              required/>
                <x-input-error :messages="$errors->get('first_name')" class="mt-2"/>
            </div>
            <div class="flex flex-col">
                <x-input-label for="last_name" :value="__('Last Name')"/>
                <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name"
                              :value="$admin->last_name"
                              required/>
                <x-input-error :messages="$errors->get('last_name')" class="mt-2"/>
            </div>
        </div>
        <div class="grid gap-6 mb-6 md:grid-cols-2">
            <div class="flex flex-col">
                <x-input-label for="email" :value="__('Email')"/>
                <x-text-input id="email" class="block mt-1 w-full" type="text" name="email" :value="$admin->email"
                              required/>
                <x-input-error :messages="$errors->get('email')" class="mt-2"/>
            </div>
            <div class="flex flex-col">
                <x-input-label for="status" :value="__('Status')"/>
                <x-select-input id="status" class="block mt-1 w-full" name="status">
                    <option>Select Status</option>
                    <option value="1" {{$admin->status  == 1 ? 'selected' : ''}}>Active</option>
                    <option value="0" {{$admin->status   == 0 ? 'selected' : ''}}>In Active</option>
                </x-select-input>
                <x-input-error :messages="$errors->get('status')" class="mt-2"/>
            </div>
        </div>


        <button class="mt-[1%] w-[60px] h-[40px] bg-primary_color rounded-lg text-normal text-natural font-big"
                type="submit">
            Update
        </button>
    </form>

@endsection
