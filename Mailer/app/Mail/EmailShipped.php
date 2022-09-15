<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailShipped extends Mailable
{
    use Queueable, SerializesModels;

    public $content;
    public $subject;

    /**
     * EmailShipped constructor.
     * @param $content
     * @param $subject
     */

    public function __construct($content, $subject)
    {
        $this->content = $content;
        $this->subject = $subject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('zakaz@sumkiplus.ru', 'ТканиПлюс')
                    ->subject($this->subject)
                    ->view('emails.default');
    }
}
