<?php

namespace App\Entity;

use App\Repository\NationalRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NationalRepository::class)]
class National
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 1000)]
    private $flag;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'string', length: 255)]
    private $country;

    #[ORM\Column(type: 'integer')]
    private $total_tournaments;

    #[ORM\Column(type: 'integer')]
    private $won_tournaments;

    #[ORM\Column(type: 'integer')]
    private $total_wins;

    #[ORM\Column(type: 'integer')]
    private $total_loses;

    #[ORM\Column(type: 'integer')]
    private $total_draws;

    #[ORM\OneToMany(mappedBy: 'national', targetEntity: Player::class)]
    private $player;

    public function __construct()
    {
        $this->player = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFlag(): ?string
    {
        return $this->flag;
    }

    public function setFlag(string $flag): self
    {
        $this->flag = $flag;

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

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getTotalTournaments(): ?int
    {
        return $this->total_tournaments;
    }

    public function setTotalTournaments(int $total_tournaments): self
    {
        $this->total_tournaments = $total_tournaments;

        return $this;
    }

    public function getWonTournaments(): ?int
    {
        return $this->won_tournaments;
    }

    public function setWonTournaments(int $won_tournaments): self
    {
        $this->won_tournaments = $won_tournaments;

        return $this;
    }

    public function getTotalWins(): ?int
    {
        return $this->total_wins;
    }

    public function setTotalWins(int $total_wins): self
    {
        $this->total_wins = $total_wins;

        return $this;
    }

    public function getTotalLoses(): ?int
    {
        return $this->total_loses;
    }

    public function setTotalLoses(int $total_loses): self
    {
        $this->total_loses = $total_loses;

        return $this;
    }

    public function getTotalDraws(): ?int
    {
        return $this->total_draws;
    }

    public function setTotalDraws(int $total_draws): self
    {
        $this->total_draws = $total_draws;

        return $this;
    }

    /**
     * @return Collection<int, Player>
     */
    public function getPlayer(): Collection
    {
        return $this->player;
    }

    public function addPlayer(Player $player): self
    {
        if (!$this->player->contains($player)) {
            $this->player[] = $player;
            $player->setNational($this);
        }

        return $this;
    }

    public function removePlayer(Player $player): self
    {
        if ($this->player->removeElement($player)) {
            // set the owning side to null (unless already changed)
            if ($player->getNational() === $this) {
                $player->setNational(null);
            }
        }

        return $this;
    }
}
