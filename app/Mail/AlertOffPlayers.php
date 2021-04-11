<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AlertOffPlayers extends Mailable
{
    use Queueable, SerializesModels;

    private $players;
    public function __construct($players)
    {
        $this->players =  $players;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
           return $this->markdown('emails.alertOffPlayers')
                 ->subject('Réponse à votre demande')
                    ->with([
                        'players' => $this->players,
                      
                    ]); 
    }
}
