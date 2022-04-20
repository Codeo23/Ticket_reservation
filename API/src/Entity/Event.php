<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\EventRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints\Choice;
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
    denormalizationContext: [
        'groups' => ['Event:Write']
    ],
    collectionOperations: [
        'get',
        'post' => [
            'input_formats' => [
                'multipart' => ['multipart/form-data'],
            ],
        ]
    ],
    itemOperations: [
        'get',
        'put',
        'delete'
    ]
)]
class Event
{
    #[ORM\Id]
    #[ORM\Column(type: 'string', length: 15)]
    #[Groups(['Event:Read', 'Event:Write'])]
    #[Length(exactly: 10, exactMessage: 'Le champ doit contenir exactement {{ limit }} caractères')]
    private $num_Event;

    #[Groups(['Event:Read', 'Event:Write'])]
    #[ORM\Column(type: 'string', length: 35)]
    #[Length(min: 2, max: 30)]
    #[NotBlank(message: 'Ce champ ne doit pas être vide')]
    private $title;

    #[Groups(['Event:Read', 'Event:Write'])]
    #[ORM\Column(type: 'string', length: 25)]
    #[Length(min: 2, max: 30)]
    #[NotBlank(message: 'Ce champ ne doit pas être vide')]
    private $category;

    # defined value ("Enfant", "Jeune", "Adulte")
    #[Groups(['Event:Read', 'Event:Write'])]
    #[ORM\Column(type: 'string', length: 15)]
    #[NotBlank(message: 'Ce champ ne doit pas être vide')]
    #[Choice(['Enfant', 'Jeune', 'Adulte'], message: "La valeur doit être Enfant , Jeune ou adulte")]
    private $categoryAge;

    #[Groups(['Event:Read', 'Event:Write'])]
    #[ORM\Column(type: 'integer')]
    #[Range(min: 0.1, max: 1800000000)]
    private $cost;

    #[Groups(['Event:Read', 'Event:Write'])]
    #[ORM\Column(type: 'datetime')]
    private $date_event;

    #[Groups(['Event:Write'])]
    private $costToString;

    #[Groups(['Event:Write'])]
    private $date_event_string;

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
 
    public function getDate_event_string(): ?string
    {
        return $this->date_event_string;
    }
 
    public function setDate_event_string(string $date_event_string)
    {
        $this->date_event_string = $date_event_string;

        return $this;
    }
}
