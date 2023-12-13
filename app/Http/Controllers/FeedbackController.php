<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\FeedbackMail;
use App\Models\FeedbackMailThanks;

class FeedbackController extends Controller
{
    public function index()
    {
        return view('playgrounds.feedback');
    }

    public function mail(Request $request)
    {   
        $request->validate([
            'name' => 'required',
            'email' => 'email:rfc,dns',
            'title' => 'required',
            'feedback' => 'required|max:2500'
        ]);

        $feedbackData = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'title' => $request->input('title'),
            'feedback' => $request->input('feedback'),
        ];

        Mail::to('palaute@leikkikentatsievi.fi')->send(new FeedbackMail($feedbackData));

        Mail::to($request->input('email'))->send(new FeedbackMailThanks($feedbackData));

        return redirect('/playgrounds')->with('message', 'Kiitos palautteestasi');
    }
}
