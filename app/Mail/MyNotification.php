<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MyNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $estágios;
    public $presenças;

    public function __construct($user, $estágios, $presenças)
    {
        $this->user = $user;
        $this->estágios = $estágios;
        $this->presenças = $presenças;
    }

    public function build()
{
    return $this->view('presenças-email-notification')
        ->with([
            'userName' => $this->user,
            'estágiosNome' => $this->estágios,
            'presençasData' => $this->presenças,
        ]);
}


}
