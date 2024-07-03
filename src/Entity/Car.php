<?php
namespace App\Entity;

use App\Repository\CarRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CarRepository::class)]
class Car
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?int $kms = null;

    #[ORM\Column(length: 255)]
    private ?string $color = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getKms(): ?int
    {
        return $this->kms;
    }
    public function setKms(?int $kms): self
    {
        $this->kms = $kms;
        return $this;
    }
    
    public function getColor(): ?string
    {
        return $this->color;
    }
    public function setColor(string $color): self
    {
        $this->color = $color;
        return $this;
    }
}