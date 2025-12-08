<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactsListMail extends Mailable
{
    use Queueable, SerializesModels;

    public $contacts;

    public function __construct($contacts)
    {
        $this->contacts = $contacts;
    }

    public function build()
    {
        return $this->from(config('mail.from.address'))
                    ->subject('Contacts List')
                    ->view('emails.contacts_list');
    }
}
