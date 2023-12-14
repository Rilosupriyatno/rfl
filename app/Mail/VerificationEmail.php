<?php

namespace App\Mail;

use App\Models\Setting\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class VerificationEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function build()
    {
        return $this->from('fiqyou805@gmail.com', 'Wafiq')
                    ->view('pages.email.verification')
                    ->with([
                        'verificationUrl' => route('verification', ['id' => $this->user->id])
                    ])
                    ->subject('Verifikasi Email');
    }
}