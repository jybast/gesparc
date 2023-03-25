<?php

namespace App\Entity;

use App\Repository\ContraventionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ContraventionRepository::class)]
class Contravention
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dat_pv = null;

    #[ORM\Column]
    private ?int $montant = null;

    #[ORM\ManyToOne(inversedBy: 'contraventions')]
    private ?Vehicule $vehicule = null;

    #[ORM\ManyToOne(inversedBy: 'contraventions')]
    private ?User $conducteur = null;

    #[ORM\ManyToOne(inversedBy: 'contraventions')]
    private ?Carnet $carnetdebord = null;

    #[ORM\OneToMany(mappedBy: 'contravention', targetEntity: ContraventionType::class)]
    private Collection $contraventionTypes;

    public function __construct()
    {
        $this->contraventionTypes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDatPv(): ?\DateTimeInterface
    {
        return $this->dat_pv;
    }

    public function setDatPv(\DateTimeInterface $dat_pv): self
    {
        $this->dat_pv = $dat_pv;

        return $this;
    }

    public function getMontant(): ?int
    {
        return $this->montant;
    }

    public function setMontant(int $montant): self
    {
        $this->montant = $montant;

        return $this;
    }

    public function getVehicule(): ?Vehicule
    {
        return $this->vehicule;
    }

    public function setVehicule(?Vehicule $vehicule): self
    {
        $this->vehicule = $vehicule;

        return $this;
    }

    public function getConducteur(): ?User
    {
        return $this->conducteur;
    }

    public function setConducteur(?User $conducteur): self
    {
        $this->conducteur = $conducteur;

        return $this;
    }

    public function getCarnetdebord(): ?Carnet
    {
        return $this->carnetdebord;
    }

    public function setCarnetdebord(?Carnet $carnetdebord): self
    {
        $this->carnetdebord = $carnetdebord;

        return $this;
    }

    /**
     * @return Collection<int, ContraventionType>
     */
    public function getContraventionTypes(): Collection
    {
        return $this->contraventionTypes;
    }

    public function addContraventionType(ContraventionType $contraventionType): self
    {
        if (!$this->contraventionTypes->contains($contraventionType)) {
            $this->contraventionTypes->add($contraventionType);
            $contraventionType->setContravention($this);
        }

        return $this;
    }

    public function removeContraventionType(ContraventionType $contraventionType): self
    {
        if ($this->contraventionTypes->removeElement($contraventionType)) {
            // set the owning side to null (unless already changed)
            if ($contraventionType->getContravention() === $this) {
                $contraventionType->setContravention(null);
            }
        }

        return $this;
    }
}
