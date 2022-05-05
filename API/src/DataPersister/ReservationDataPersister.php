<?php

namespace App\DataPersister;

use ApiPlatform\Core\DataPersister\ContextAwareDataPersisterInterface;
use App\Entity\Reservation;
use App\Repository\ClientRepository;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;

final class ReservationDataPersister implements ContextAwareDataPersisterInterface {
    
    public function __construct(private EntityManagerInterface $em)
    {
    }

    public function supports($data, array $context = []): bool
    {
        return $data instanceof Reservation;
    }

    public function persist($data, array $context = [])
    {
        if(isset($context['collection_operation_name']) && $context['collection_operation_name'] === 'post'){
        dd($data);
        // $user = $this->rep->findOneBy(['email' => 'rajoelisonainatiavina@gmail.com']);
        $data->setDateReservation(new DateTime());
        // dd($user);
        }
        return $data;
    }

    public function remove($data, array $context = [])
    {
        
    }
}