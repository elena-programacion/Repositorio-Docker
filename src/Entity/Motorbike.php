<?php

namespace App\Entity;

use App\Repository\MotorbikeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MotorbikeRepository::class)]
class Motorbike
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?int $CC = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCC(): ?int
    {
        return $this->CC;
    }

    public function setCC(?int $CC): static
    {
        $this->CC = $CC;

        return $this;
    }
}
