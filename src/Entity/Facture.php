<?php

namespace App\Entity;

use App\Repository\FactureRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FactureRepository::class)]
class Facture
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $date_emis = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dat_recu = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dat_paye = null;

    #[ORM\Column(length: 150, nullable: true)]
    private ?string $mode_paye = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2, nullable: true)]
    private ?string $montant_ttc = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $statut = null;

    #[ORM\ManyToOne(inversedBy: 'factures')]
    private ?Fournisseur $fournisseur = null;

    #[ORM\OneToMany(mappedBy: 'facture', targetEntity: Entretien::class)]
    private Collection $entretien;

    public function __construct()
    {
        $this->entretien = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateEmis(): ?\DateTimeInterface
    {
        return $this->date_emis;
    }

    public function setDateEmis(?\DateTimeInterface $date_emis): self
    {
        $this->date_emis = $date_emis;

        return $this;
    }

    public function getDatRecu(): ?\DateTimeInterface
    {
        return $this->dat_recu;
    }

    public function setDatRecu(?\DateTimeInterface $dat_recu): self
    {
        $this->dat_recu = $dat_recu;

        return $this;
    }

    public function getDatPaye(): ?\DateTimeInterface
    {
        return $this->dat_paye;
    }

    public function setDatPaye(?\DateTimeInterface $dat_paye): self
    {
        $this->dat_paye = $dat_paye;

        return $this;
    }

    public function getModePaye(): ?string
    {
        return $this->mode_paye;
    }

    public function setModePaye(?string $mode_paye): self
    {
        $this->mode_paye = $mode_paye;

        return $this;
    }

    public function getMontantTtc(): ?string
    {
        return $this->montant_ttc;
    }

    public function setMontantTtc(?string $montant_ttc): self
    {
        $this->montant_ttc = $montant_ttc;

        return $this;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(?string $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    public function getFournisseur(): ?Fournisseur
    {
        return $this->fournisseur;
    }

    public function setFournisseur(?Fournisseur $fournisseur): self
    {
        $this->fournisseur = $fournisseur;

        return $this;
    }

    /**
     * @return Collection<int, Entretien>
     */
    public function getEntretien(): Collection
    {
        return $this->entretien;
    }

    public function addEntretien(Entretien $entretien): self
    {
        if (!$this->entretien->contains($entretien)) {
            $this->entretien->add($entretien);
            $entretien->setFacture($this);
        }

        return $this;
    }

    public function removeEntretien(Entretien $entretien): self
    {
        if ($this->entretien->removeElement($entretien)) {
            // set the owning side to null (unless already changed)
            if ($entretien->getFacture() === $this) {
                $entretien->setFacture(null);
            }
        }

        return $this;
    }
}
