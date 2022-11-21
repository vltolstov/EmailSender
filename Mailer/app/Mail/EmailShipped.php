<?php

namespace App\Mail;

use App\Models\Config;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Headers;

class EmailShipped extends Mailable
{
    use Queueable, SerializesModels;

    public $content;
    public $subject;
    public $email;
    public $fromEmail;
    public $fromName;
    public $replyToEmail;
    public $replyToName;
    public $baseUrl;

    /**
     * EmailShipped constructor.
     * @param $content
     * @param $subject
     * @param $email
     * @param $fromEmail
     * @param $fromName
     * @param $replyToEmail
     * @param $replyToName
     * @param $baseUrl
     */

    public function __construct($content, $subject, $email, $fromEmail, $fromName, $replyToEmail, $replyToName, $baseUrl)
    {
        $this->content = $content;
        $this->subject = $subject;
        $this->email = $email;
        $this->fromEmail = $fromEmail;
        $this->fromName = $fromName;
        $this->replyToEmail = $replyToEmail;
        $this->replyToName = $replyToName;
        $this->baseUrl = $baseUrl;
    }

    public function headers()
    {

        $value = '<' . $this->baseUrl . '/unsubscribe/' . $this->email . '>';

        return new Headers(
            text: [
                'List-Unsubscribe' => $value,
            ],
        );
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->fromEmail, $this->fromName)
                    ->replyTo($this->replyToEmail, $this->replyToName)
                    ->subject($this->subject)
                    ->view('emails.default');
    }
}
