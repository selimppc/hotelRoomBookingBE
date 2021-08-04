<?php

namespace App\Entity;

use App\Repository\RoomRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RoomRepository::class)
 */
class Room
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Hotel::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private ?Hotel $hotel;

    /**
     * @ORM\Column(type="integer")
     */
    private ?int $number;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private ?string $name;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private ?bool $status;

    /**
     * @ORM\ManyToOne(targetEntity=RoomType::class)
     */
    private ?RoomType $room_type;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private ?bool $is_smoke;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHotel(): ?Hotel
    {
        return $this->hotel;
    }

    public function setHotel(?Hotel $hotel): self
    {
        $this->hotel = $hotel;

        return $this;
    }

    public function getNumber(): ?int
    {
        return $this->number;
    }

    public function setNumber(int $number): self
    {
        $this->number = $number;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getStatus(): ?bool
    {
        return $this->status;
    }

    public function setStatus(?bool $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getRoomType(): ?RoomType
    {
        return $this->room_type;
    }

    public function setRoomType(?RoomType $room_type): self
    {
        $this->room_type = $room_type;

        return $this;
    }

    public function getIsSmoke(): ?bool
    {
        return $this->is_smoke;
    }

    public function setIsSmoke(?bool $is_smoke): self
    {
        $this->is_smoke = $is_smoke;

        return $this;
    }
}
