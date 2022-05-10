<?php

namespace App\EventListener;

use Lexik\Bundle\JWTAuthenticationBundle\Event\AuthenticationSuccessEvent;
use Lexik\Bundle\JWTAuthenticationBundle\Event\JWTCreatedEvent;
use Lexik\Bundle\JWTAuthenticationBundle\Event\JWTExpiredEvent;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;

final class JWTEventListener {

    public function __construct(private RequestStack $req)
    {
    }

    public function onJWTCreated(JWTCreatedEvent $event){
        
        $payload = $event->getData();  
        $payload['clientId'] = $event->getUser()->getCodeCli();     // store the Client's codecli
        
        $event->setData($payload);
    }

    public function onAuthenticationSuccess(AuthenticationSuccessEvent $event){
        
        $cookie = new Cookie(
            name: 'Token',
            value: $event->getData()['token'],
            expire: time()+7200,
            path: '/'
        );
        
        $rep = new Response;
        $rep->headers->setCookie($cookie);
        $rep->send();
    }

    public function onJWTExpired(JWTExpiredEvent $event){

        $this->req->getMainRequest()->cookies->remove('Token'); // remove the token
    }
}