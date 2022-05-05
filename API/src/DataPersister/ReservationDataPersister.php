<?php

namespace App\DataPersister;

use ApiPlatform\Core\DataPersister\ContextAwareDataPersisterInterface;
use App\Entity\Reservation;
use App\Repository\ClientRepository;
use App\Repository\EventRepository;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;

final class ReservationDataPersister implements ContextAwareDataPersisterInterface {
    
    public function __construct(private EntityManagerInterface $em, private ClientRepository $rep, 
        private EventRepository $rep2)
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
            $user = $this->rep->findOneBy(['email' => 'rajoelisonainatiavina@gmail.com']);
            $event = $this->rep2->findOneBy(["num_Event" => "E_20042002"]);
            $data->setClient($user);
            $data->setEvent($event);

            $this->em->persist($data);
        }
        $this->em->flush();

        return $data;
    }

    public function remove($data, array $context = [])
    {
        
    }
}