<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ReservationRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Range;

#[ORM\Entity(repositoryClass: ReservationRepository::class)]
#[ORM\Table(name: 'Reservations')]
#[ApiResource(
    normalizationContext: [
        'groups' => ['Res:Read']
    ],
    collectionOperations: [
        'get',
        'post' => [
            'groups' => ['Res:Write'],
            'security' => "is_granted('ROLE_USER')"
        ]
    ],
    itemOperations: [
        'get',
        'payment' => [
            'route_name' => 'reservation_payment',
            'method' => 'POST',
            'security' => "is_granted('ROLE_USER')",
            'openapi_context' => [
                'summary' => 'Handle the payment operation'
            ]
        ],
    ]
)]
class Reservation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups(['Res:Read'])]
    private $id;

    #[ORM\Column(type: 'string', length: 4)]
    #[Groups(['Res:Read', 'Res:Write'])]
    #[NotBlank(message: 'Ce champ ne peut pas être vide !')]
    #[Range(min: 1, max: 200, notInRangeMessage: "La valeur n'est pas prise en charge.")]
    private $numPlace;

    #[ORM\Column(type: 'date')]
    #[Groups(['Res:Read'])]
    #[Date(message: 'Date Invalide')]
    private $dateReservation;

    #[Groups(['Res:Write'])]
    #[NotBlank(message: 'Ce champ ne peut pas être vide')]
    private $eventReference;

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

    public function getEventReference()
    {
        return $this->eventReference;
    }

    public function setEventReference(string $eventReference)
    {
        $this->eventReference = $eventReference;

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