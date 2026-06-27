@extends('layouts.public')

@section('title', 'Request Account Deletion')

@section('content')
<section class="bg-[#F9FAFB] px-6 py-24 text-[#1F2937] md:py-28">
    <div class="mx-auto max-w-3xl rounded-[8px] bg-white p-6 shadow-sm md:p-10">
        <header class="border-b border-gray-200 pb-6">
            <p class="text-sm font-semibold uppercase tracking-wide text-[#226F65]">PerfTraka</p>
            <h1 class="mt-2 text-3xl font-bold text-[#111827] md:text-4xl">Request Account Deletion</h1>
            <p class="mt-3 leading-7 text-gray-600">
                Submit the email address connected to your account and tell us why you want it deleted.
            </p>
        </header>

        <div class="mt-8">
            @include('flash-message')

            <form action="{{ route('account-deletion.store') }}" method="POST" class="space-y-6">
                @csrf

                <div>
                    <label for="email" class="block text-[#344054] font-big text-normal">Email</label>
                    <input
                        id="email"
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        class="outline-none mt-2 w-full border border-[#D0D5DD] bg-transparent h-[3em] px-3 py-2 rounded-lg text-[#667085] placeholder-color font-normal text-normal focus:outline-none focus:border-primary_color focus:ring-1 focus:ring-background_color"
                        placeholder="you@example.com"
                        required
                    >
                    @error('email')
                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="reason" class="block text-[#344054] font-big text-normal">Reason for account deletion</label>
                    <textarea
                        id="reason"
                        name="reason"
                        rows="7"
                        class="outline-none mt-2 block bg-transparent px-3 py-2 w-full text-[#667085] font-normal text-normal placeholder-color rounded-lg border border-[#D0D5DD] focus:outline-none focus:border-primary_color focus:ring-1 focus:ring-background_color"
                    >{{ old('reason') }}</textarea>
                    @error('reason')
                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <button
                    type="submit"
                    class="bg-[#C52216] w-full h-[56px] rounded-[8px] text-size1 font-[600] text-[#ffffff]"
                >
                    Submit Request
                </button>
            </form>
        </div>
    </div>
</section>
@endsection
