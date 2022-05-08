<?php

namespace App\DataPersister;

use ApiPlatform\Core\DataPersister\ContextAwareDataPersisterInterface;
use App\Entity\Reservation;
use App\Message\SendTicket;
use App\Repository\ClientRepository;
use App\Repository\EventRepository;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Lexik\Bundle\JWTAuthenticationBundle\Encoder\JWTEncoderInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;

final class ReservationDataPersister implements ContextAwareDataPersisterInterface {
    
    public function __construct(private EntityManagerInterface $em, private ClientRepository $rep, 
        private EventRepository $rep2, private MessageBusInterface $bus, private JWTEncoderInterface $jwtDecode)
    {
    }

    public function supports($data, array $context = []): bool
    {
        return $data instanceof Reservation;
    }

    public function persist($data, array $context = [])
    {
        $data->setDateReservation(new DateTime());
        
        if(isset($context['collection_operation_name']) && $context['collection_operation_name'] === 'post'){
            // decode the token after that get the value of the username and fetch the corresponded user.
            $user = $this->rep->findOneBy(['email' => $this->jwtDecode->decode($_COOKIE['token'])['username']]);
            $event = $this->rep2->findOneBy(["num_Event" => $data->getEventReference()]);
            if(!$event) {
                return new JsonResponse(data: [
                    'message' => 'Ressource introuvable'
                ], status: Response::HTTP_NOT_FOUND);
            }

            $data->setClient($user);
            $data->setEvent($event);

            $this->bus->dispatch(new SendTicket($data));

            $this->em->persist($data);
        }
        $this->em->flush();
        
        return $data;
    }

    public function remove($data, array $context = [])
    {
        
    }
}