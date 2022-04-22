<?php

namespace App\DataPersister;

use ApiPlatform\Core\DataPersister\ContextAwareDataPersisterInterface;
use App\Entity\Client;
use Doctrine\ORM\EntityManagerInterface;

class ClientDataPersister implements ContextAwareDataPersisterInterface{
    
    public function __construct(private EntityManagerInterface $em)
    {
    }

    public function supports($data, array $context = []): bool
    {
        return $data instanceof Client;    
    }

    public function persist($data, array $context = [])
    {
        return $data;
    }

    public function remove($data, array $context = [])
    {
        return $data;
    }
}