<?php

namespace App\Service;

use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class SendInformationEmail {

    public function __construct(private MailerInterface $mailer)
    {
    }

    public function send(string $email){
        $info = (new Email())
            ->from('noreply@gmail.com')
            ->to($email)
            ->subject('Evènement reporté à une date ultérieur')
            ->text("Nous sommes navré de vous apprendre que l'évènement a été reporté.")
        ;
        $this->mailer->send($info);
    }
}