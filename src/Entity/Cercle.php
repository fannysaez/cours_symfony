<?php

namespace App\Entity;

use App\Repository\CercleRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CercleRepository::class)]
class Cercle
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?float $rayon = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRayon(): ?float
    {
        return $this->rayon;
    }

    public function setRayon(float $rayon): static
    {
        $this->rayon = $rayon;

        return $this;
    }
    
    public function getSurface(): float
    {
        return pi() * $this->rayon**2;
    }

    public function getDiametre(): float
    {
        return 2*$this->rayon;
    }
}
