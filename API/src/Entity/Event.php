<?php

namespace App\Entity;

use App\Repository\EventRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EventRepository::class)]
#[ORM\Table(name: "Events")]
class Event
{
    #[ORM\Id]
    #[ORM\Column(type: 'string', length: 15)]
    private $num_Event;

    #[ORM\Column(type: 'string', length: 35)]
    private $title;

    #[ORM\Column(type: 'string', length: 25)]
    private $category;

    #[ORM\Column(type: 'string', length: 15)]
    # defined value ("Enfant", "Jeune", "Adulte")
    private $categoryAge;

    #[ORM\Column(type: 'integer')]
    private $cost;

    #[ORM\Column(type: 'datetime')]
    private $date_event;

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
