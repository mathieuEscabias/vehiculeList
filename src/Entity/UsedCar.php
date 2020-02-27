<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UsedCarRepository")
 */
class UsedCar
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $kilometre;

    /**
     * @ORM\Column(type="integer")
     */
    private $price;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $guaranteed;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $comment;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $photo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $fuel;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\User", mappedBy="usedCar", cascade={"persist", "remove"})
     */
    private $usedCar;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\category", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $category;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\car", inversedBy="car", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $car;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getKilometre(): ?int
    {
        return $this->kilometre;
    }

    public function setKilometre(int $kilometre): self
    {
        $this->kilometre = $kilometre;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getGuaranteed(): ?int
    {
        return $this->guaranteed;
    }

    public function setGuaranteed(?int $guaranteed): self
    {
        $this->guaranteed = $guaranteed;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(?string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    public function getFuel(): ?string
    {
        return $this->fuel;
    }

    public function setFuel(string $fuel): self
    {
        $this->fuel = $fuel;

        return $this;
    }

    public function getUsedCar(): ?User
    {
        return $this->usedCar;
    }

    public function setUsedCar(?User $usedCar): self
    {
        $this->usedCar = $usedCar;

        // set (or unset) the owning side of the relation if necessary
        $newUsedCar = null === $usedCar ? null : $this;
        if ($usedCar->getUsedCar() !== $newUsedCar) {
            $usedCar->setUsedCar($newUsedCar);
        }

        return $this;
    }

    public function getCategory(): ?category
    {
        return $this->category;
    }

    public function setCategory(category $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getCar(): ?car
    {
        return $this->car;
    }

    public function setCar(car $car): self
    {
        $this->car = $car;

        return $this;
    }
}
