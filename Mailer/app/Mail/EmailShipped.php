<?php

namespace App\Mail;

use App\Models\Config;
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

        $arr = [];
        $config = Config::get();
        foreach ($config as $item){
            $arr[$item->name] = $item->value;
        }

        return $this->from($arr['from-email'], $arr['from-name'])
                    ->replyTo($arr['reply-to-email'], $arr['reply-to-name'])
                    ->subject($this->subject)
                    ->view('emails.default');
    }
}
