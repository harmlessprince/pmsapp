@extends('layouts.guest')
@section('title', 'Login')
@section('body')
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')"/>
    <form class="w-96 bg-background_color mx-auto rounded-xl px-1% py-2%" method="POST" action="{{ route('login') }}">
        @csrf
        <div
            class="w-12 h-12 bg-logo text-primary_color p-2 mx-auto flex flex-row items-center justify-center font-medium mb-5%">
            Logo
        </div>
        <div class="text-white text-xl text-center font-bold">Log in to your account</div>
        <div class="text-basic text-sm font-normal text-center mb-5%">Welcome back! Please enter your details.</div>
        @if ($message = Session::get('banned'))
            <div class="text-red-400 ms-3 text-sm font-medium">
                {{$message}}
            </div>
        @endif

        <div class="mb-5%">
            <label class="block text-natural font-medium text-sm">Email</label>
            <input
                type="email"
                class="w-full border border-natural bg-transparent h-11 px-2 py-1 rounded-lg text-natural
            placeholder-color font-normal text-normal
            focus:outline-none focus:border-primary_color focus:ring-1 focus:ring-background_color
            focus:invalid:error focus:invalid:error
            "
                placeholder="Enter your email" name="email" value=""/>
            <x-input-error :messages="$errors->get('email')" class="mt-2"/>
        </div>

        <div class="mb-5%">
            <label class="block text-natural font-medium text-normal">Password</label>
            <input
                type="password"
                class="w-full border border-natural bg-transparent h-11 px-2 py-1 rounded-lg text-natural
                placeholder-color font-normal text-normal
                focus:outline-none focus:border-primary_color focus:ring-1 focus:ring-background_color
                focus:invalid:error focus:invalid:error
                "
                placeholder=". . . . . . . " name="password" value=""/>
            <x-input-error :messages="$errors->get('password')" class="mt-2"/>
        </div>

        <button class="bg-primary_color text-natural h-11 w-full rounded-lg text-base font-semibold">Log in</button>
    </form>
@endsection
