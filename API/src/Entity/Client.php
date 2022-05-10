<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Controller\LogoutHandler;
use App\Repository\ClientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

#[ORM\Entity(repositoryClass: ClientRepository::class)]
#[ORM\Table('Clients')]
#[ApiResource(
    normalizationContext: [
        'groups' => ['Client:Read']
    ],
    collectionOperations: [
        'get' => [
            'security' => "is_granted('ROLE_ADMIN')"
        ],
        'post' => [
            'groups' => ['Client:Write'],
        ]
    ],
    itemOperations: [
        'get' => [
            'security' => "is_granted('ROLE_USER')"
        ],
        'put' => [
            'groups' => ['Client:Edit']
        ],
        'delete' => [
            'security' => "is_granted('ROLE_USER')"
        ]
    ]
)]
class Client implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\Column(type: 'string', length: 15)]
    #[Groups(['Client:Read'])]
    private $codeCli;

    #[ORM\Column(type: 'string', length: 40)]
    #[Groups(['Client:Read', 'Client:Write'])]
    #[NotBlank(message: 'Ce champ ne peut pas être vide!')]
    #[Length(min: 3, max: 40, minMessage: 'Caractère minimum approuvé {{ limit }}', 
            maxMessage: 'Caractère maximum approuvé {{ limit }}')]
    private $lastName;

    #[ORM\Column(type: 'string', length: 40, nullable: true)]
    #[Groups(['Client:Read', 'Client:Write'])]
    #[NotBlank(message: 'Ce champ ne peut pas être vide!')]
    #[Length(min: 3, max: 40, minMessage: 'Caractère minimum approuvé {{ limit }}', 
            maxMessage: 'Caractère maximum approuvé {{ limit }}')]
    private $firstName;

    #[ORM\Column(type: 'string', length: 50, unique: true)]
    #[Groups(['Client:Read', 'Client:Write', 'Client:Edit'])]
    #[NotBlank(message: 'Ce champ ne peut pas être vide!')]
    #[Email(message: 'Email invalide')]
    private $email;

    #[ORM\Column(type: 'json')]
    #[Groups(['Client:Read', 'Client:Write', 'Client:Edit'])]
    private $roles = [];

    #[ORM\Column(type: 'string', length: 150)]
    #[Groups(['Client:Write'])]
    #[NotBlank(message: 'Ce champ ne peut pas être vide!')]
    #[Length(min: 5, max: 60, minMessage: 'Caractère minimum approuvé {{ limit }}', 
            maxMessage: 'Caractère maximum approuvé {{ limit }}')]
    private $password;

    #[ORM\Column(type: 'string', length: 11, unique: true)]
    #[Groups(['Client:Read', 'Client:Write', 'Client:Edit'])]
    #[NotBlank(message: 'Ce champ ne peut pas être vide!')]
    #[Length(exactly: 10, exactMessage: 'Le champ doit contenir {{ limit }} chiffres')]
    private $telephone;

    #[ORM\Column(type: 'string', length: 20, unique: true)]
    #[Groups(['Client:Read', 'Client:Write', 'Client:Edit'])]
    #[NotBlank(message: 'Ce champ ne peut pas être vide!')]
    #[Length(exactly: 16, exactMessage: 'Carte invalide')]
    private $cardNumber;

    #[ORM\OneToMany(mappedBy: 'Client', targetEntity: Reservation::class, orphanRemoval: true)]
    private $reservations;

    public function __construct()
    {
        $this->reservations = new ArrayCollection();
    }
    

    public function getCodeCli(): string
    {
        return $this->codeCli;
    }

    public function setCodeCli(string $codeCli)
    {
        $this->codeCli = $codeCli;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(?string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @deprecated since Symfony 5.3, use getUserIdentifier instead
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getCardNumber(): ?string
    {
        return $this->cardNumber;
    }

    public function setCardNumber(string $cardNumber): self
    {
        $this->cardNumber = $cardNumber;

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
            $reservation->setClient($this);
        }

        return $this;
    }

    public function removeReservation(Reservation $reservation): self
    {
        if ($this->reservations->removeElement($reservation)) {
            // set the owning side to null (unless already changed)
            if ($reservation->getClient() === $this) {
                $reservation->setClient(null);
            }
        }

        return $this;
    } 
}
