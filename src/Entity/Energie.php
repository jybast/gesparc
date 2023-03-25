<?php

namespace App\Entity;

use App\Repository\EnergieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EnergieRepository::class)]
class Energie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 5)]
    private ?string $code = null;

    #[ORM\Column(length: 50)]
    private ?string $nom = null;

    #[ORM\OneToMany(mappedBy: 'energie_type', targetEntity: Carnet::class)]
    private Collection $carnetdebord;

    public function __construct()
    {
        $this->carnetdebord = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return Collection<int, Carnet>
     */
    public function getCarnetdebord(): Collection
    {
        return $this->carnetdebord;
    }

    public function addCarnetdebord(Carnet $carnetdebord): self
    {
        if (!$this->carnetdebord->contains($carnetdebord)) {
            $this->carnetdebord->add($carnetdebord);
            $carnetdebord->setEnergieType($this);
        }

        return $this;
    }

    public function removeCarnetdebord(Carnet $carnetdebord): self
    {
        if ($this->carnetdebord->removeElement($carnetdebord)) {
            // set the owning side to null (unless already changed)
            if ($carnetdebord->getEnergieType() === $this) {
                $carnetdebord->setEnergieType(null);
            }
        }

        return $this;
    }
}
