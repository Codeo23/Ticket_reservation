<?php

namespace App\EventListener;

use Lexik\Bundle\JWTAuthenticationBundle\Event\AuthenticationSuccessEvent;
use Lexik\Bundle\JWTAuthenticationBundle\Event\JWTCreatedEvent;
use Lexik\Bundle\JWTAuthenticationBundle\Event\JWTExpiredEvent;

final class JWTEventListener {

    public function onJWTCreated(JWTCreatedEvent $event){
        
        $payload = $event->getData();  
        $payload['clientId'] = $event->getUser()->getCodeCli();     // store the Client's codecli
        $payload['email'] = $payload['username'];      
        unset($payload['username']);        // remove the username field from the payload 

        $event->setData($payload);
    }

    public function onAuthenticationSuccess(AuthenticationSuccessEvent $event){
        
        setcookie(name: 'token', value: $event->getData()['token'], expires_or_options: 7200, path: '/');
    }

    public function onJWTExpired(JWTExpiredEvent $event){

        setcookie(name: 'token', expires_or_options: time() - 3600);
    }
}