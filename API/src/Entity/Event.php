<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\EventRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Range;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
* @Vich\Uploadable
*/
#[ORM\Entity(repositoryClass: EventRepository::class)]
#[ORM\Table(name: "Events")]
#[ApiResource(
    normalizationContext: [
        'groups' => ['Event:Read']
    ],
    collectionOperations: [
        'get',
        'post' => [
            'input_formats' => [
                'multipart' => ['multipart/form-data'],
            ],
            'groups' => ['Event:Write'],
            'security' => "is_granted('ROLE_ADMIN')"    
        ]
    ],
    itemOperations: [
        'get',
        'put' => [
            'groups' => 'Event:Edit',
            'security' => "is_granted('ROLE_ADMIN')"    
        ],
        'delete' => [
            'security' => "is_granted('ROLE_ADMIN')"    
        ]
    ]
)]
class Event
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups(['Event:Read'])]
    private $id;

    #[ORM\Column(type: 'string', length: 15, unique: true)]
    #[Groups(['Event:Read'])]
    private $num_Event;

    #[Groups(['Event:Read', 'Event:Write', 'Event:Edit'])]
    #[ORM\Column(type: 'string', length: 35)]
    #[Length(min: 2, max: 30)]
    #[NotBlank(message: 'Ce champ ne doit pas être vide')]
    private $title;

    #[Groups(['Event:Read', 'Event:Write', 'Event:Edit'])]
    #[ORM\Column(type: 'string', length: 25, unique: true)]
    #[Length(min: 2, max: 30)]
    #[NotBlank(message: 'Ce champ ne doit pas être vide')]
    private $category;

    # defined value ("Enfant", "Jeune", "Adulte")
    #[Groups(['Event:Read', 'Event:Write', 'Event:Edit'])]
    #[ORM\Column(type: 'string', length: 15)]
    #[NotBlank(message: 'Ce champ ne doit pas être vide')]
    #[Choice(['Enfant', 'Jeune', 'Adulte'], message: "Ce champ devra contenir l'un de ces valeurs: Enfant, Jeune ou Adulte")]
    private $categoryAge;

    #[Groups(['Event:Read', 'Event:Write', 'Event:Edit'])]
    #[ORM\Column(type: 'integer')]
    #[Range(min: 0.1, max: 1800000000, invalidMessage: 'Valeur invalide')]
    private $cost;

    #[Groups(['Event:Read', 'Event:Write', 'Event:Edit'])]
    #[ORM\Column(type: 'datetime', unique: true)]
    #[Date(message: 'Date invalide', groups: ['Event:Edit'])]
    private $date_event;

    #[Groups(['Event:Write'])]
    #[Range(min: 0, max: 1000000000, invalidMessage: 'Valeur invalide')]
    #[NotBlank(message: 'Ce champ ne doit pas être vide', groups: ['Event:Write'])]
    private $costToString;

    #[Groups(['Event:Write'])]
    #[Length(exactly: 10, exactMessage: 'Le champ doit contenir 10 caractères')]
    #[Date(message: 'Date invalide')]
    #[NotBlank(message: 'Ce champ ne doit pas être vide', groups: ['Event:Write'])]
    private $dateEventString;

    #[Groups(['Event:Read', 'Event:Write'])]
    public ?string $contentUrl = null;

    /**
    * @Vich\UploadableField(mapping="event", fileNameProperty="filePath")
    */
    #[Groups(['Event:Write'])]
    public ?File $file = null;

    #[ORM\Column(nullable: true)]
    #[Groups(['Event:Read', 'Event:Write'])] 
    public ?string $filePath = null;

    #[ORM\OneToMany(mappedBy: 'event', targetEntity: Reservation::class, orphanRemoval: true)]
    private $reservations;

    public function __construct()
    {
        $this->reservations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumEvent(): ?string
    {
        return $this->num_Event;
    }

    public function setNumEvent(string $num_Event): self
    {
        $this->num_Event = $num_Event;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(string $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getCategoryAge(): ?string
    {
        return $this->categoryAge;
    }

    public function setCategoryAge(string $categoryAge): self
    {
        $this->categoryAge = $categoryAge;

        return $this;
    }

    public function getCost(): ?int
    {
        return $this->cost;
    }

    public function setCost(int $cost): self
    {
        $this->cost = $cost;

        return $this;
    }

    public function getDateEvent(): ?\DateTimeInterface
    {
        return $this->date_event;
    }

    public function setDateEvent(\DateTimeInterface $date_event): self
    {
        $this->date_event = $date_event;

        return $this;
    }

    public function getCostToString(): string
    {
        return $this->costToString;
    }

    public function setCostToString(string $costToString)
    {
        $this->costToString = $costToString;

        return $this;
    }
 
    public function getDateEventString(): ?string
    {
        return $this->dateEventString;
    }
 
    public function setDateEventString(string $dateEventString)
    {
        $this->dateEventString = $dateEventString;

        return $this;
    }

    /**
     * @return Collection<int, Reservation>
     */
    public function getReservations(): Collection
    {
        return $this->reservations;
    }

    public function addReservation(Reservation $reservation): self
    {
        if (!$this->reservations->contains($reservation)) {
            $this->reservations[] = $reservation;
            $reservation->setEvent($this);
        }

        return $this;
    }

    public function removeReservation(Reservation $reservation): self
    {
        if ($this->reservations->removeElement($reservation)) {
            // set the owning side to null (unless already changed)
            if ($reservation->getEvent() === $this) {
                $reservation->setEvent(null);
            }
        }

        return $this;
    }
}
