<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UpdateMail extends Mailable
{
    use Queueable, SerializesModels;

    public $students;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($students)
    {
        $this->students = $students;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.updatemail')
                    ->subject('Laravel Mail Testing For Assigment')
                    ->with(['student'=>$this->students]);
    }
}
