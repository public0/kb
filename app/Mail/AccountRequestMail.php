<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AccountRequestMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        return $this->view('emails.auth-account-request')
            ->with([
                'data' => $this->data,
                'internal' => true
            ])
            ->subject(__(':name Account Request', ['name' => config('app.name')]));
    }
}
