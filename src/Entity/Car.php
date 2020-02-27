<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CarRepository")
 */
class Car
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
    private $year;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $gearBox;

    /**
     * @ORM\Column(type="integer")
     */
    private $place;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $fiscalPower;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\UsedCar", mappedBy="car", cascade={"persist", "remove"})
     */
    private $car;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\model", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $model;

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getYear(): ?int
    {
        return $this->year;
    }

    public function setYear(int $year): self
    {
        $this->year = $year;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getGearBox(): ?string
    {
        return $this->gearBox;
    }

    public function setGearBox(string $gearBox): self
    {
        $this->gearBox = $gearBox;

        return $this;
    }

    public function getPlace(): ?int
    {
        return $this->place;
    }

    public function setPlace(int $place): self
    {
        $this->place = $place;

        return $this;
    }

    public function getFiscalPower(): ?string
    {
        return $this->fiscalPower;
    }

    public function setFiscalPower(string $fiscalPower): self
    {
        $this->fiscalPower = $fiscalPower;

        return $this;
    }

    public function getCar(): ?UsedCar
    {
        return $this->car;
    }

    public function setCar(UsedCar $car): self
    {
        $this->car = $car;

        // set the owning side of the relation if necessary
        if ($car->getCar() !== $this) {
            $car->setCar($this);
        }

        return $this;
    }

    public function getModel(): ?model
    {
        return $this->model;
    }

    public function setModel(model $model): self
    {
        $this->model = $model;

        return $this;
    }
}
