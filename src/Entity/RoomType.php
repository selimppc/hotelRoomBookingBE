<?php

namespace App\Entity;

use App\Repository\RoomTypeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RoomTypeRepository::class)
 */
class RoomType
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private ?string $description;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private ?int $max_capacity;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getMaxCapacity(): ?int
    {
        return $this->max_capacity;
    }

    public function setMaxCapacity(?int $max_capacity): self
    {
        $this->max_capacity = $max_capacity;

        return $this;
    }

}
