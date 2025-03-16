<?php

namespace App\Entity;

use App\Repository\RectangleRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RectangleRepository::class)]
class Rectangle
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?float $longueur = null;

    #[ORM\Column]
    private ?float $largeur = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLongueur(): ?float
    {
        return $this->longueur;
    }

    public function setLongueur(float $longueur): static
    {
        $this->longueur = $longueur;

        return $this;
    }

    public function getLargeur(): ?float
    {
        return $this->largeur;
    }

    public function setLargeur(float $largeur): static
    {
        $this->largeur = $largeur;

        return $this;
    }

    public function estUnCarre(): bool
    {
        return $this->longueur === $this->largeur;
    }

    public function calculerPerimetre(): float
    {
        return 2 * ($this->longueur + $this->largeur);
    }
    
}
