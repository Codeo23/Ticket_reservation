<?php

namespace App\MessageHandler;

use App\Message\SendInformationEmail;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;
use Symfony\Component\Mime\Email;

#[AsMessageHandler]
class SendInformationEmailHandler{
    
    public function __construct(private MailerInterface $mailer)
    {
    }

    public function __invoke(SendInformationEmail $info)
    {
        $info = (new Email())
            ->from('noreply@gmail.com')
            ->to($info->getEmail())
            ->subject('Evènement reporté à une date ultérieur')
            ->text("Nous sommes navré de vous apprendre que l'évènement a été reporté.")
        ;
        $this->mailer->send($info);
    }
}