<?php

namespace App\Mail;

use App\Models\User;
use App\Models\Question;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifyAuthorMailable extends Mailable
{
    use Queueable, SerializesModels;
    public $question , $author;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Question $question, User $author)
    {
        $this->question=$question;
        $this->author=$author;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Nuevo Comentario')
                    ->markdown('mail.notify-author',[
                        'question'=>$this->question,
                        'author'=>$this->author
                    ]);
    }
}
