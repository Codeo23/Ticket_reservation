<?php

namespace App\Message;

class SendInformationEmail {

    public function __construct(private string $email)
    {
    }

    public function getEmail(){
        
        return $this->email;
    }
}