<?php

namespace App\Entity;

use App\Repository\HouseRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HouseRepository::class)]
class House
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $address = null;

    #[ORM\Column]
    private ?int $price = null;

    #[ORM\Column]
    private ?int $meters = null;

    public function getId(): ?int
    {
        return $this->id;
    }
    public function getAddress(): ?string
    {
        return $this->address;
    }
    public function setAddress(string $address): void
    {
        $this->name = $address;
    }
    public function getPrice(): ?int
    {
        return $this->price;
    }
    public function setPrice(int $price): void
    {
        $this->price = $price;
    }
    public function getMeters(): ?int
    {
        return $this->meters;
    }
    public function setMeters(int $meters): void
    {
        $this->price = $meters;
    }
}