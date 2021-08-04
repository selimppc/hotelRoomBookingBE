<?php

namespace App\Entity;

use App\Repository\OccupiedRoomRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OccupiedRoomRepository::class)
 */
class OccupiedRoom
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private ?\DateTimeInterface $check_in;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private ?\DateTimeInterface $check_out;

    /**
     * @ORM\ManyToOne(targetEntity=Room::class)
     */
    private ?Room $room;

    /**
     * @ORM\ManyToOne(targetEntity=Reservation::class)
     */
    private ?Reservation $reservation;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCheckIn(): ?\DateTimeInterface
    {
        return $this->check_in;
    }

    public function setCheckIn(\DateTimeInterface $check_in): self
    {
        $this->check_in = $check_in;

        return $this;
    }

    public function getCheckOut(): ?\DateTimeInterface
    {
        return $this->check_out;
    }

    public function setCheckOut(?\DateTimeInterface $check_out): self
    {
        $this->check_out = $check_out;

        return $this;
    }

    public function getRoom(): ?Room
    {
        return $this->room;
    }

    public function setRoom(?Room $room): self
    {
        $this->room = $room;

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
}
