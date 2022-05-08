<?php

namespace App\Message;

use App\Entity\Reservation;

class SendTicket{
    
    public function __construct(private Reservation $reservation)
    {
    }

    public function getReservation()
    {    
        return $this->reservation; 
    }
}