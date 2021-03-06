<?php

namespace App\Entity;

use App\Repository\PlayerRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlayerRepository::class)]
class Player
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 1000)]
    private $photo;

    #[ORM\Column(type: 'string', length: 255)]
    private $firstname;

    #[ORM\Column(type: 'string', length: 255)]
    private $lastname;

    #[ORM\Column(type: 'integer')]
    private $age;

    #[ORM\Column(type: 'integer')]
    private $size;

    #[ORM\Column(type: 'string', length: 3)]
    private $nationality;

    #[ORM\Column(type: 'string', length: 3)]
    private $position;

    #[ORM\Column(type: 'integer')]
    private $trophies;

    #[ORM\Column(type: 'integer')]
    private $yellow_cards;

    #[ORM\Column(type: 'integer')]
    private $red_cards;

    #[ORM\Column(type: 'integer')]
    private $total_goals;

    #[ORM\Column(type: 'integer')]
    private $total_assists;

    #[ORM\ManyToOne(targetEntity: Club::class, inversedBy: 'player')]
    private $club;

    #[ORM\ManyToOne(targetEntity: National::class, inversedBy: 'player')]
    private $national;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(int $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function getSize(): ?int
    {
        return $this->size;
    }

    public function setSize(int $size): self
    {
        $this->size = $size;

        return $this;
    }

    public function getNationality(): ?string
    {
        return $this->nationality;
    }

    public function setNationality(string $nationality): self
    {
        $this->nationality = $nationality;

        return $this;
    }

    public function getPosition(): ?string
    {
        return $this->position;
    }

    public function setPosition(string $position): self
    {
        $this->position = $position;

        return $this;
    }

    public function getTrophies(): ?int
    {
        return $this->trophies;
    }

    public function setTrophies(int $trophies): self
    {
        $this->trophies = $trophies;

        return $this;
    }

    public function getYellowCards(): ?int
    {
        return $this->yellow_cards;
    }

    public function setYellowCards(int $yellow_cards): self
    {
        $this->yellow_cards = $yellow_cards;

        return $this;
    }

    public function getRedCards(): ?int
    {
        return $this->red_cards;
    }

    public function setRedCards(int $red_cards): self
    {
        $this->red_cards = $red_cards;

        return $this;
    }

    public function getTotalGoals(): ?int
    {
        return $this->total_goals;
    }

    public function setTotalGoals(int $total_goals): self
    {
        $this->total_assists = $total_goals;

        return $this;
    }

    public function getTotalAssists(): ?int
    {
        return $this->total_assists;
    }

    public function setTotalAssists(int $total_assists): self
    {
        $this->total_assists = $total_assists;

        return $this;
    }

    public function getClub(): ?Club
    {
        return $this->club;
    }

    public function setClub(?Club $club): self
    {
        $this->club = $club;

        return $this;
    }

    public function getNational(): ?National
    {
        return $this->national;
    }

    public function setNational(?National $national): self
    {
        $this->national = $national;

        return $this;
    }
}
