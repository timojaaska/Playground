<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FeedbackMail extends Mailable
{
    use Queueable, SerializesModels;

    public $feedbackData;

    public function __construct($feedbackData)
    {
        $this->feedbackData = $feedbackData;
    }

    public function build()
    {
        return $this->from($this->feedbackData['email'], $this->feedbackData['name'])
        ->subject($this->feedbackData['title'])
        ->view('emails.feedback');
    }
}