<?php

namespace App\Entity;

use App\Repository\EntretienRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EntretienRepository::class)]
class Entretien
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'entretiens')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Vehicule $vehicule = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dat_entretien = null;

    #[ORM\Column(nullable: true)]
    private ?int $km_compteur = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 7, scale: 2, nullable: true)]
    private ?string $montant_ttc = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $date_prochain = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $observations = null;

    #[ORM\OneToMany(mappedBy: 'entretien', targetEntity: EntretienType::class)]
    private Collection $entretienTypes;

    #[ORM\ManyToOne(inversedBy: 'entretien')]
    private ?Facture $facture = null;

    public function __construct()
    {
        $this->entretienTypes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getDatEntretien(): ?\DateTimeInterface
    {
        return $this->dat_entretien;
    }

    public function setDatEntretien(?\DateTimeInterface $dat_entretien): self
    {
        $this->dat_entretien = $dat_entretien;

        return $this;
    }

    public function getKmCompteur(): ?int
    {
        return $this->km_compteur;
    }

    public function setKmCompteur(?int $km_compteur): self
    {
        $this->km_compteur = $km_compteur;

        return $this;
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

    public function getMontantTtc(): ?string
    {
        return $this->montant_ttc;
    }

    public function setMontantTtc(?string $montant_ttc): self
    {
        $this->montant_ttc = $montant_ttc;

        return $this;
    }

    public function getDateProchain(): ?\DateTimeInterface
    {
        return $this->date_prochain;
    }

    public function setDateProchain(?\DateTimeInterface $date_prochain): self
    {
        $this->date_prochain = $date_prochain;

        return $this;
    }

    public function getObservations(): ?string
    {
        return $this->observations;
    }

    public function setObservations(?string $observations): self
    {
        $this->observations = $observations;

        return $this;
    }

    /**
     * @return Collection<int, EntretienType>
     */
    public function getEntretienTypes(): Collection
    {
        return $this->entretienTypes;
    }

    public function addEntretienType(EntretienType $entretienType): self
    {
        if (!$this->entretienTypes->contains($entretienType)) {
            $this->entretienTypes->add($entretienType);
            $entretienType->setEntretien($this);
        }

        return $this;
    }

    public function removeEntretienType(EntretienType $entretienType): self
    {
        if ($this->entretienTypes->removeElement($entretienType)) {
            // set the owning side to null (unless already changed)
            if ($entretienType->getEntretien() === $this) {
                $entretienType->setEntretien(null);
            }
        }

        return $this;
    }

    public function getFacture(): ?Facture
    {
        return $this->facture;
    }

    public function setFacture(?Facture $facture): self
    {
        $this->facture = $facture;

        return $this;
    }
}
