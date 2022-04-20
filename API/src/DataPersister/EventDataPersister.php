<?php

namespace App\DataPersister;

use ApiPlatform\Core\DataPersister\ContextAwareDataPersisterInterface;
use App\Entity\Event;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;

final class EventDataPersister implements ContextAwareDataPersisterInterface {

    public function __construct(private EntityManagerInterface $em)
    {
    }
    
    public function supports($data, array $context = []): bool 
    {
        return $data instanceof Event;
    }

    public function persist($data, array $context = []) {

        if(isset($context['collection_operation_name']) && $context['collection_operation_name'] === 'post'){
            $data->setCost((int)$data->getCostToString());
            $data->setDateEvent(new DateTime($data->getDate_event_string()));
            $data->setNumEvent('E_'.date_format($data->getDateEvent(), 'dmY'));
            $this->em->persist($data);
        }

        if(isset($context['item_operation_name']) && $context['item_operation_name'] === 'put'){
            // send email to client while modifying an event
        }

        $this->em->flush();

        return $data;
    }

    public function remove($data, array $context = []) {
        $this->em->remove($data);
        $this->em->flush();
    }
}