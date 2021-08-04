<?php

namespace App\Entity;

use App\Repository\ReservedRoomRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ReservedRoomRepository::class)
 */
class ReservedRoom
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private ?int $number_of_rooms;

    /**
     * @ORM\ManyToOne(targetEntity=RoomType::class)
     */
    private ?RoomType $room_type;

    /**
     * @ORM\ManyToOne(targetEntity=Reservation::class)
     */
    private ?Reservation $reservation;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private ?bool $status;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumberOfRooms(): ?int
    {
        return $this->number_of_rooms;
    }

    public function setNumberOfRooms(?int $number_of_rooms): self
    {
        $this->number_of_rooms = $number_of_rooms;

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

    public function getReservation(): ?Reservation
    {
        return $this->reservation;
    }

    public function setReservation(?Reservation $reservation): self
    {
        $this->reservation = $reservation;

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
}
