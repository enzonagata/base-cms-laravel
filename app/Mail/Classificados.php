<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Classificados extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($form, $subject)
    {
        $this->form = $form;
        $this->subject = $subject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from('contato@apmpriopreto.com.br', 'APMP São José do Rio Preto')
            ->subject("Classificado | " . $this->subject)
            ->view('emails.contact', $this->form);
    }
}
