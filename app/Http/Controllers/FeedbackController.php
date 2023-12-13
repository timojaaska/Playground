<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\FeedbackMail;

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

        // Mail::to('palaute@leikkikentatsievi.fi')
        // ->cc($request->email)
        // ->subject('Palauteviesti')
        // ->text($request->feedback)
        // ->from($request->email)
        // ->send();
        $feedbackData = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'title' => $request->input('title'),
            'feedback' => $request->input('feedback'),
            // 'name' => $request->name,
            // 'email' => $request->email,
            // 'feedback' => $request->feedback,
        ];

        Mail::to('palaute@leikkikentatsievi.fi')
        ->from($request->input('email'), $request->input('name'))
        ->send(new FeedbackMail($feedbackData));

        return redirect('/playgrounds')->with('message', 'Kiitos palautteestasi');
    }
}
