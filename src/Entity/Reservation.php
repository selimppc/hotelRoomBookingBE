<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ReservationRepository::class)
 */
class Reservation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $date_in;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $date_out;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $made_by;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="reservations")
     * @ORM\JoinColumn(nullable=true)
     */
    private $client;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateIn(): ?\DateTimeInterface
    {
        return $this->date_in;
    }

    public function setDateIn(?\DateTimeInterface $date_in): self
    {
        $this->date_in = $date_in;

        return $this;
    }

    public function getDateOut(): ?\DateTimeInterface
    {
        return $this->date_out;
    }

    public function setDateOut(?\DateTimeInterface $date_out): self
    {
        $this->date_out = $date_out;

        return $this;
    }

    public function getMadeBy(): ?int
    {
        return $this->made_by;
    }

    public function setMadeBy(?int $made_by): self
    {
        $this->made_by = $made_by;

        return $this;
    }

    public function getClient(): ?User
    {
        return $this->client;
    }

    public function setClient(?User $client): self
    {
        $this->client = $client;

        return $this;
    }
}
