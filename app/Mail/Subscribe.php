<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class Subscribe extends Mailable
{
    use Queueable, SerializesModels;

    protected $name;
    protected $body;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $body)
    {
        $this->name = $name;
        $this->body = $body;
    }

    public function build()
    {
        return $this->subject('Новости с сайта Friendly')->view('mail.send', ['name' => $this->name, 'body' => $this->body]);
    }
}
