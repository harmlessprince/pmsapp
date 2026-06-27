<?php

namespace App\Http\Controllers;

use App\Mail\DeleteAccountRequestMail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class DeleteAccountRequestController extends Controller
{
    public function create(): View
    {
        return view('account-deletion');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'email' => ['required', 'email', 'max:255'],
            'reason' => ['nullable', 'string', 'max:2000'],
        ]);

        try {
            Mail::to(config('app.contact_us_mail'))->send(new DeleteAccountRequestMail(
                $validated['email'],
                $validated['reason'] ?? '',
            ));
        } catch (\Exception $exception) {
            logger($exception);

            return back()
                ->withInput()
                ->with('error', 'We could not submit your request at this time. Please try again later.');
        }

        return redirect()
            ->route('account-deletion')
            ->with('success', 'Your account deletion request has been submitted.');
    }
}
