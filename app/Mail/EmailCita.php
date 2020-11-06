<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Http\Resources\Email as EmailResource;

class EmailCita extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $data;
    public function __construct($data)
    {
        //
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $address = 'webcitas@clinicasantaisabel.com';
        $subject = 'Clinica santa isabel';
        $name = 'Clinica santa isabel';

        return $this->markdown('emails.EmailCitas')
            ->from($address, $name)
            ->subject($subject)
            ->replyTo($address, $name)
            ->with('data', EmailResource::collection($this->data));
    }
}
