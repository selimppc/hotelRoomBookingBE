<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @ORM\Table(name="`user`")
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=128, nullable=true)
     */
    private ?string $first_name;

    /**
     * @ORM\Column(type="string", length=128, nullable=true)
     */
    private ?string $last_name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $email;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->first_name;
    }

    public function setFirstname(?string $first_name): self
    {
        $this->$first_name = $first_name;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->last_name;
    }

    public function setLastname(?string $last_name): self
    {
        $this->last_name = $last_name;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

}
