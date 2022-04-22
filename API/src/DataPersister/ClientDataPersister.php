<?php

namespace App\DataPersister;

use ApiPlatform\Core\DataPersister\ContextAwareDataPersisterInterface;
use App\Entity\Client;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class ClientDataPersister implements ContextAwareDataPersisterInterface{
    
    public function __construct(private UserPasswordHasherInterface $passwordHasherInterface, 
        private EntityManagerInterface $em)
    {
    }

    public function supports($data, array $context = []): bool
    {
        return $data instanceof Client;    
    }

    public function persist($data, array $context = [])
    {
        if(isset($context['collection_operation_name']) && $context['collection_operation_name'] === 'post'){
            $data->setCodeCli('C_'.$data->getTelephone());
            // encode the password
            $data->setPassword($this->passwordHasherInterface->hashPassword($data, $data->getPassword()));
            $this->em->persist($data);
        }
        $this->em->flush();

        return $data;
    }

    public function remove($data, array $context = [])
    {
        $this->em->remove($data);
        $this->em->flush();
    }
}