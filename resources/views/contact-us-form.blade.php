<form class="mt-5" action="{{route('contact-us')}}" method="POST" id="contactForm">
    @csrf
    <div class="flex flex-row justify-between mb-5">
        <div class="w-[48%]">
            <label class="block text-[#344054] font-big text-normal">First name</label>
            <input
                type="text"
                class="outline-none w-full border border-[#D0D5DD] bg-transparent h-[3em] px-2 py-1 rounded-lg text-[#667085]
                        placeholder-color font-normal text-normal
                        focus:outline-none focus:border-primary_color focus:ring-1 focus:ring-background_color
                        focus:invalid:error focus:invalid:error
                        "
                placeholder="First name" name="first_name" value="" required/>
            {{-- <x-input-error :messages="$errors->get('email')" class="mt-2"/> --}}
        </div>
        <div class="w-[48%]">
            <label class="block text-[#344054] font-big text-normal">Last name</label>
            <input
                type="text"
                class="outline-none w-full border border-[#D0D5DD] bg-transparent h-[3em] px-2 py-1 rounded-lg text-[#667085]
                        placeholder-color font-normal text-normal
                        focus:outline-none focus:border-primary_color focus:ring-1 focus:ring-background_color
                        focus:invalid:error focus:invalid:error
                        "
                placeholder="Last name" name="last_name" value="" required/>
        </div>
    </div>

    <div class="mb-5">
        <div class="w-full">
            <label class="block text-[#344054] font-big text-normal">Email</label>
            <input
                type="email"
                class="outline-none w-full border border-[#D0D5DD] bg-transparent h-[3em] px-2 py-1 rounded-lg text-[#667085]
                        placeholder-color font-normal text-normal
                        focus:outline-none focus:border-primary_color focus:ring-1 focus:ring-background_color
                        focus:invalid:error focus:invalid:error
                        "
                placeholder="you@company.com" name="email" value="" required/>
        </div>
    </div>

    <div class="mb-5">
        <div class="w-full">
            <label class="block text-[#344054] font-big text-normal">Message</label>
            <textarea id="message" rows="5"
                      class="outline-none block bg-transparent px-2 py-1 w-full text-[#667085] font-normal text-normal placeholder-color rounded-lg border border-[#D0D5DD]
                        focus:outline-none focus:border-primary_color focus:ring-1 focus:ring-background_color
                        " name="message" required></textarea>
        </div>
    </div>

    <button type="submit" class="bg-[#C52216] w-full h-[60px] rounded-[10px] text-size1 font-[600] text-[#ffffff] " id="contactUsButton">Submit
    </button>
</form>


