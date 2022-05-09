<?php

namespace App\EventListener;

use Lexik\Bundle\JWTAuthenticationBundle\Event\JWTCreatedEvent;

final class JWTListener {

    public function onJWTCreated(JWTCreatedEvent $event){
        
        $payload = $event->getData();  
        $payload['clientId'] = $event->getUser()->getCodeCli();     // store the Client's codecli
        $payload['email'] = $payload['username'];      
        unset($payload['username']);        // remove the username field from the payload 
    }
}