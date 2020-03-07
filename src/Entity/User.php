<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lastName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $firstName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $photoUser;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Company", mappedBy="user", cascade={"persist", "remove"})
     */
    private $company;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\usedCar", inversedBy="usedCar", cascade={"persist", "remove"})
     */
    private $usedCar;

    public function getId(): ?int
    {
        return $this->id;
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

    public function setFirstName(string $firstName): self
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

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getPhotoUser(): ?string
    {
        return $this->photoUser;
    }

    public function setPhotoUser(string $photoUser): self
    {
        $this->photoUser = $photoUser;

        return $this;
    }

    public function getCompany(): ?Company
    {
        return $this->company;
    }

    public function setCompany(Company $company): self
    {
        $this->company = $company;

        // set the owning side of the relation if necessary
        if ($company->getUser() !== $this) {
            $company->setUser($this);
        }

        return $this;
    }

    public function getUsedCar(): ?usedCar
    {
        return $this->usedCar;
    }

    public function setUsedCar(?usedCar $usedCar): self
    {
        $this->usedCar = $usedCar;

        return $this;
    }
}
