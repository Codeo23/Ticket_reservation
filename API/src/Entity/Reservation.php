<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ReservationRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: ReservationRepository::class)]
#[ORM\Table(name: 'Reservations')]
#[ApiResource(
    normalizationContext: [
        'groups' => ['Res:Read']
    ],
    collectionOperations: [
        'get',
        'post' => [
            'groups' => ['Res:Write']
        ]
    ],
    itemOperations: [
        'get',
        'put',
        'delete'
    ]
)]
class Reservation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 4)]
    #[Groups(['Res:Read', 'Res:Write'])]
    private $numPlace;

    #[ORM\Column(type: 'date')]
    #[Groups(['Res:Read'])]
    private $dateReservation;

    #[ORM\ManyToOne(targetEntity: Client::class, inversedBy: 'reservations')]
    #[ORM\JoinColumn(nullable: false, referencedColumnName: 'code_cli')]
    #[Groups(['Res:Read'])]
    private $client;

    #[ORM\ManyToOne(targetEntity: Event::class, inversedBy: 'reservations')]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups('Res:Read')]
    private $event;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumPlace(): ?string
    {
        return $this->numPlace;
    }

    public function setNumPlace(string $numPlace): self
    {
        $this->numPlace = $numPlace;

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

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;

        return $this;
    }

    public function getEvent(): ?Event
    {
        return $this->event;
    }

    public function setEvent(?Event $event): self
    {
        $this->event = $event;

        return $this;
    }
}
