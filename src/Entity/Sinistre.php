<?php

namespace App\Entity;

use App\Repository\SinistreRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SinistreRepository::class)]
class Sinistre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dat_sinistre = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $lieu_sinistre = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $circonstances = null;

    #[ORM\Column(nullable: true)]
    private ?bool $materiel = null;

    #[ORM\Column(nullable: true)]
    private ?bool $corporel = null;

    #[ORM\Column(nullable: true)]
    private ?int $blesses = null;

    #[ORM\Column(nullable: true)]
    private ?int $tues = null;

    #[ORM\Column(nullable: true)]
    private ?bool $responsable = null;

    #[ORM\Column(nullable: true)]
    private ?bool $pv_police = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $date_pv = null;

    #[ORM\Column(length: 150, nullable: true)]
    private ?string $unite_police = null;

    #[ORM\Column(nullable: true)]
    private ?bool $expertise = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $date_expertise = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $observations = null;

    #[ORM\ManyToOne(inversedBy: 'sinistres')]
    private ?Vehicule $vehicule = null;

    #[ORM\ManyToOne(inversedBy: 'sinistres')]
    private ?User $conducteur = null;

    #[ORM\ManyToOne(inversedBy: 'sinistres')]
    private ?Carnet $carnetdebord = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDatSinistre(): ?\DateTimeInterface
    {
        return $this->dat_sinistre;
    }

    public function setDatSinistre(\DateTimeInterface $dat_sinistre): self
    {
        $this->dat_sinistre = $dat_sinistre;

        return $this;
    }

    public function getLieuSinistre(): ?string
    {
        return $this->lieu_sinistre;
    }

    public function setLieuSinistre(?string $lieu_sinistre): self
    {
        $this->lieu_sinistre = $lieu_sinistre;

        return $this;
    }

    public function getCirconstances(): ?string
    {
        return $this->circonstances;
    }

    public function setCirconstances(?string $circonstances): self
    {
        $this->circonstances = $circonstances;

        return $this;
    }

    public function isMateriel(): ?bool
    {
        return $this->materiel;
    }

    public function setMateriel(?bool $materiel): self
    {
        $this->materiel = $materiel;

        return $this;
    }

    public function isCorporel(): ?bool
    {
        return $this->corporel;
    }

    public function setCorporel(?bool $corporel): self
    {
        $this->corporel = $corporel;

        return $this;
    }

    public function getBlesses(): ?int
    {
        return $this->blesses;
    }

    public function setBlesses(?int $blesses): self
    {
        $this->blesses = $blesses;

        return $this;
    }

    public function getTues(): ?int
    {
        return $this->tues;
    }

    public function setTues(?int $tues): self
    {
        $this->tues = $tues;

        return $this;
    }

    public function isResponsable(): ?bool
    {
        return $this->responsable;
    }

    public function setResponsable(?bool $responsable): self
    {
        $this->responsable = $responsable;

        return $this;
    }

    public function isPvPolice(): ?bool
    {
        return $this->pv_police;
    }

    public function setPvPolice(?bool $pv_police): self
    {
        $this->pv_police = $pv_police;

        return $this;
    }

    public function getDatePv(): ?\DateTimeInterface
    {
        return $this->date_pv;
    }

    public function setDatePv(?\DateTimeInterface $date_pv): self
    {
        $this->date_pv = $date_pv;

        return $this;
    }

    public function getUnitePolice(): ?string
    {
        return $this->unite_police;
    }

    public function setUnitePolice(?string $unite_police): self
    {
        $this->unite_police = $unite_police;

        return $this;
    }

    public function isExpertise(): ?bool
    {
        return $this->expertise;
    }

    public function setExpertise(?bool $expertise): self
    {
        $this->expertise = $expertise;

        return $this;
    }

    public function getDateExpertise(): ?\DateTimeInterface
    {
        return $this->date_expertise;
    }

    public function setDateExpertise(?\DateTimeInterface $date_expertise): self
    {
        $this->date_expertise = $date_expertise;

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
}
