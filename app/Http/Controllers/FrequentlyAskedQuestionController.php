<?php

namespace App\Http\Controllers;

use App\Models\FrequentlyAskedQuestion;
use Illuminate\Http\Request;

class FrequentlyAskedQuestionController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'question' => ['required', 'string', 'max:200', 'min:5'],
            'answer' => ['required', 'string', 'min:5'],
        ]);

        FrequentlyAskedQuestion::query()->create([
            "question" => $request->input('question'),
            "answer" => $request->input('answer')
        ]);
        return redirect(route('admin.faqs.index'))->with('success', 'Faq created successfully');
    }

    public function index(Request $request)
    {
        $faqs = FrequentlyAskedQuestion::query()->get();
        $countOfFaqs = FrequentlyAskedQuestion::query()->count();
        return view('faq.index', compact('faqs', 'countOfFaqs'));
    }

    public function edit(FrequentlyAskedQuestion $faq)
    {
        return view('faq.edit', compact('faq'));
    }
    public function create()
    {
        return view('faq.create');
    }

    public function update(Request $request, FrequentlyAskedQuestion $faq)
    {
        $this->validate($request, [
            'question' => ['required', 'string', 'max:200', 'min:5'],
            'answer' => ['required', 'string', 'min:5'],
        ]);

        $faq->update([
            "question" => $request->input('question'),
            "answer" => $request->input('answer')
        ]);
        return redirect(route('admin.faqs.index'))->with('success', 'Faq updated successfully');

    }

    public function destroy(FrequentlyAskedQuestion $faq)
    {
        $faq->delete();
        return redirect(route('admin.faqs.index'))->with('success', 'Faq deleted successfully');
    }


}
