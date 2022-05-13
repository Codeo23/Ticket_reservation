<?php

namespace App\MessageHandler;

use App\Message\SendTicket;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;
use Symfony\Component\Mime\Email;

#[AsMessageHandler]
class SendTicketHandler{

    public function __construct(private MailerInterface $mailer)
    {
    }

    public function __invoke(SendTicket $ticket)
    {
        $mail = (new Email())
            ->from('noreply@gmail.com')
            ->to($ticket->getEmail())
            ->subject("Ticket pour l'évènement du ".$ticket->getDate()->format('d-m-Y'))
            ->text('Voici votre ticket')
        ;

        $this->mailer->send($mail);
    }
}