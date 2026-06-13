@extends('layouts.public')

@section('title', 'PERFTRAKA Frequently Asked Questions')

@push('styles')
    <style>
        /* this style is for the frequently used summary tag */
        .questions {
            width: 100%;
            background-color: #226F65;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
            font-weight: 500;
            font-size: 18px;
            cursor: pointer;
            color: #fff;
            padding: 0.5rem;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center
        }

        .faq {
            width: 100%;
            background-color: #fff;
            border-radius: 8px;
            font-weight: 500;
            font-size: 18px;
            cursor: pointer;
            color: #000;
            padding: 1rem 0.5rem;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center
        }
    </style>

@endpush

@section('content')

    <div
        class="mt-[1.5em] h-[30vh] w-full flex flex-row items-center justify-center font-bigger text-[#fff] text-[3em] bg-col3">
        FAQ
    </div>

    {{-- frequently asked --}}
    <section class="bg-col4 py-[5%] px-[15%]  max-mobile:px-[5%]">
        <header class="font-bigger text-header text-center">Frequently Asked <span
                class="text-[#C52216]">Questions</span>
            <form class="relative w-full my-5" action="{{route('faq')}}" method="GET">
                <input type="search" placeholder="Type your Questions"
                       class="w-full pr-[75px] bg-[#fff] text-eighteen font-big h-[3.75em] rounded-[10px] outline-none border border-[#838383]"
                       value="{{request()->query('search')}}"
                       name="search"
                />
                <button
                type="submit"
                    class="flex flex-row items-center justify-center absolute top-[1px] right-0 bg-col3 w-[64px] h-[66px] rounded-tr-[10px] rounded-br-[10px]">
                    <span class="material-symbols-outlined mr-4 w-[18px] h-[18px] text-[#fff] ">Search</span>
            </button>
        </form>
            @foreach($faqs as $faq)
                <div class="group my-5">
                    <summary id="" class="questions faq">
                        <span class="font-[500]"> {{$faq->question}}</span>
                        <span class="material-symbols-outlined mr-4 w-[18px] h-[18px] text-[#000] arrow">expand_more</span>
                    </summary>
                    <article
                        class="article hidden bg-[#fff] text-[#000] px-2 pt-5 pb-10 text-eighteen font-normal text-left">
                        {{$faq->answer}}
                    </article>
                </div>
            @endforeach


        </header>
    </section>

@endsection

@push('scripts')
<script>
    const faq = document.getElementsByClassName("faq");
    const ques = document.getElementsByClassName("questions");

    let i;

    for (i = 0; i < faq.length; i++) {
        faq[i].addEventListener("click", function () {
            // change all summary to white
            for (var k = 0; k < ques.length; k++) {
                ques[k].classList.add("faq")
            }

            this.classList.remove("faq");
            var content = this.nextElementSibling;
            if (content.style.display === "block") {
                this.classList.add("faq");
                content.style.display = "none";

            } else {
                // First, close all other collapsibles
                var allContent = document.getElementsByClassName("article");
                for (var j = 0; j < allContent.length; j++) {
                    allContent[j].style.display = "none";
                }
                // Then, open this collapsible
                content.style.display = "block";

            }
        });
    }
</script>
@endpush
