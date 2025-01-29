<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendRegistrationEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $userName;
    public $recipientEmail;

    public function __construct($userName, $recipientEmail)
    {
        $this->userName = $userName;
        $this->recipientEmail = $recipientEmail;
    }

    public function handle()
    {
        Mail::to($this->recipientEmail)->send(new YourMailClass($this->userName));
    }
}
