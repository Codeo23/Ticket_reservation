<?php

namespace App\Message;

use App\Entity\Reservation;
use DateTime;

class SendTicket{
    
    public function __construct(private string $email, private DateTime $date)
    {
    }

    public function getEmail()
    {    
        return $this->email; 
    }

    public function getDate()
    {
        return $this->date;
    }
}