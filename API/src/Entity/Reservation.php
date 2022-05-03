<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReservationRepository::class)]
class Reservation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 4)]
    private $NumPlace;

    #[ORM\Column(type: 'date')]
    private $dateReservation;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumPlace(): ?string
    {
        return $this->NumPlace;
    }

    public function setNumPlace(string $NumPlace): self
    {
        $this->NumPlace = $NumPlace;

        return $this;
    }

    public function getDateReservation(): ?\DateTimeInterface
    {
        return $this->dateReservation;
    }

    public function setDateReservation(\DateTimeInterface $dateReservation): self
    {
        $this->dateReservation = $dateReservation;

        return $this;
    }
}
