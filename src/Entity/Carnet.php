<?php

namespace App\Entity;

use App\Repository\CarnetRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CarnetRepository::class)]
class Carnet
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'carnetdebord')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Vehicule $vehicule = null;

    #[ORM\Column(length: 100)]
    private ?string $lieu_depart = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $lieu_retour = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $itineraire = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dat_mission = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $heure_depart = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $heure_retour = null;

    #[ORM\Column]
    private ?int $km_compteur_retour = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $observations = null;

    #[ORM\ManyToOne(inversedBy: 'carnetdebord')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $conducteur = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 5, scale: 2, nullable: true)]
    private ?string $energie_volume = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 6, scale: 2, nullable: true)]
    private ?string $energie_ttc = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 5, scale: 2, nullable: true)]
    private ?string $cout_unite = null;

    #[ORM\ManyToOne(inversedBy: 'carnetdebord')]
    private ?Energie $energie_type = null;

    #[ORM\OneToMany(mappedBy: 'carnetdebord', targetEntity: Contravention::class)]
    private Collection $contraventions;

    #[ORM\OneToMany(mappedBy: 'carnetdebord', targetEntity: Sinistre::class)]
    private Collection $sinistres;

    #[ORM\OneToMany(mappedBy: 'carnetdebord', targetEntity: Carte::class)]
    private Collection $cartes;

    public function __construct()
    {
        $this->contraventions = new ArrayCollection();
        $this->sinistres = new ArrayCollection();
        $this->cartes = new ArrayCollection();
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

    public function getLieuDepart(): ?string
    {
        return $this->lieu_depart;
    }

    public function setLieuDepart(string $lieu_depart): self
    {
        $this->lieu_depart = $lieu_depart;

        return $this;
    }

    public function getLieuRetour(): ?string
    {
        return $this->lieu_retour;
    }

    public function setLieuRetour(?string $lieu_retour): self
    {
        $this->lieu_retour = $lieu_retour;

        return $this;
    }

    public function getItineraire(): ?string
    {
        return $this->itineraire;
    }

    public function setItineraire(?string $itineraire): self
    {
        $this->itineraire = $itineraire;

        return $this;
    }

    public function getDatMission(): ?\DateTimeInterface
    {
        return $this->dat_mission;
    }

    public function setDatMission(\DateTimeInterface $dat_mission): self
    {
        $this->dat_mission = $dat_mission;

        return $this;
    }

    public function getHeureDepart(): ?\DateTimeInterface
    {
        return $this->heure_depart;
    }

    public function setHeureDepart(\DateTimeInterface $heure_depart): self
    {
        $this->heure_depart = $heure_depart;

        return $this;
    }

    public function getHeureRetour(): ?\DateTimeInterface
    {
        return $this->heure_retour;
    }

    public function setHeureRetour(\DateTimeInterface $heure_retour): self
    {
        $this->heure_retour = $heure_retour;

        return $this;
    }

    public function getKmCompteurRetour(): ?int
    {
        return $this->km_compteur_retour;
    }

    public function setKmCompteurRetour(int $km_compteur_retour): self
    {
        $this->km_compteur_retour = $km_compteur_retour;

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

    public function getConducteur(): ?User
    {
        return $this->conducteur;
    }

    public function setConducteur(?User $conducteur): self
    {
        $this->conducteur = $conducteur;

        return $this;
    }

    public function getEnergieVolume(): ?string
    {
        return $this->energie_volume;
    }

    public function setEnergieVolume(string $energie_volume): self
    {
        $this->energie_volume = $energie_volume;

        return $this;
    }

    public function getEnergieTtc(): ?string
    {
        return $this->energie_ttc;
    }

    public function setEnergieTtc(string $energie_ttc): self
    {
        $this->energie_ttc = $energie_ttc;

        return $this;
    }

    public function getCoutUnite(): ?string
    {
        return $this->cout_unite;
    }

    public function setCoutUnite(?string $cout_unite): self
    {
        $this->cout_unite = $cout_unite;

        return $this;
    }

    public function getEnergieType(): ?Energie
    {
        return $this->energie_type;
    }

    public function setEnergieType(?Energie $energie_type): self
    {
        $this->energie_type = $energie_type;

        return $this;
    }

    /**
     * @return Collection<int, Contravention>
     */
    public function getContraventions(): Collection
    {
        return $this->contraventions;
    }

    public function addContravention(Contravention $contravention): self
    {
        if (!$this->contraventions->contains($contravention)) {
            $this->contraventions->add($contravention);
            $contravention->setCarnetdebord($this);
        }

        return $this;
    }

    public function removeContravention(Contravention $contravention): self
    {
        if ($this->contraventions->removeElement($contravention)) {
            // set the owning side to null (unless already changed)
            if ($contravention->getCarnetdebord() === $this) {
                $contravention->setCarnetdebord(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Sinistre>
     */
    public function getSinistres(): Collection
    {
        return $this->sinistres;
    }

    public function addSinistre(Sinistre $sinistre): self
    {
        if (!$this->sinistres->contains($sinistre)) {
            $this->sinistres->add($sinistre);
            $sinistre->setCarnetdebord($this);
        }

        return $this;
    }

    public function removeSinistre(Sinistre $sinistre): self
    {
        if ($this->sinistres->removeElement($sinistre)) {
            // set the owning side to null (unless already changed)
            if ($sinistre->getCarnetdebord() === $this) {
                $sinistre->setCarnetdebord(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Carte>
     */
    public function getCartes(): Collection
    {
        return $this->cartes;
    }

    public function addCarte(Carte $carte): self
    {
        if (!$this->cartes->contains($carte)) {
            $this->cartes->add($carte);
            $carte->setCarnetdebord($this);
        }

        return $this;
    }

    public function removeCarte(Carte $carte): self
    {
        if ($this->cartes->removeElement($carte)) {
            // set the owning side to null (unless already changed)
            if ($carte->getCarnetdebord() === $this) {
                $carte->setCarnetdebord(null);
            }
        }

        return $this;
    }
}
