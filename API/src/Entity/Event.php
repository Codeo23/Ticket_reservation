<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\EventRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\HttpFoundation\File\File;
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
    private $num_Event;

    #[Groups(['Event:Read', 'Event:Write'])]
    #[ORM\Column(type: 'string', length: 35)]
    private $title;

    #[Groups(['Event:Read', 'Event:Write'])]
    #[ORM\Column(type: 'string', length: 25)]
    private $category;

    # defined value ("Enfant", "Jeune", "Adulte")
    #[Groups(['Event:Read', 'Event:Write'])]
    #[ORM\Column(type: 'string', length: 15)]
    private $categoryAge;

    #[Groups(['Event:Read', 'Event:Write'])]
    #[ORM\Column(type: 'integer')]
    private $cost;

    #[Groups(['Event:Read', 'Event:Write'])]
    #[ORM\Column(type: 'datetime')]
    private $date_event;

    #[Groups(['Event:read'])]
    public ?string $contentUrl = null;

    /**
     * @Vich\UploadableField(mapping="event", fileNameProperty="filePath")
     */
    #[Groups(['book:write'])]
    public ?File $file = null;

    #[ORM\Column(nullable: true)] 
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
}
