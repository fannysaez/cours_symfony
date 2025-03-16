<?php

namespace App\Entity;

use App\Repository\HumanRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HumanRepository::class)]
class Human
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Nom = null;

    #[ORM\Column(length: 255)]
    private ?string $Prenom = null;

    /**
     * @var Collection<int, Cat>
     */
    #[ORM\OneToMany(targetEntity: Cat::class, mappedBy: 'human')]
    private Collection $chats;

    public function __construct()
    {
        $this->chats = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): static
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->Prenom;
    }

    public function setPrenom(string $Prenom): static
    {
        $this->Prenom = $Prenom;

        return $this;
    }

    /**
     * @return Collection<int, Cat>
     */
    public function getChats(): Collection
    {
        return $this->chats;
    }

    public function addChat(Cat $chat): static
    {
        if (!$this->chats->contains($chat)) {
            $this->chats->add($chat);
            $chat->setHuman($this);
        }

        return $this;
    }

    public function removeChat(Cat $chat): static
    {
        if ($this->chats->removeElement($chat)) {
            // set the owning side to null (unless already changed)
            if ($chat->getHuman() === $this) {
                $chat->setHuman(null);
            }
        }

        return $this;
    }
}
