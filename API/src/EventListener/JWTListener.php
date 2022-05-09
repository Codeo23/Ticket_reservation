<?php

namespace App\EventListener;

use Lexik\Bundle\JWTAuthenticationBundle\Event\JWTCreatedEvent;

final class JWTListener {

    public function onJWTCreated(JWTCreatedEvent $event){
        dd($event);
    }
}