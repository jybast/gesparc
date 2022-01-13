<?php

namespace App\Entity;

use App\Repository\VehiculeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VehiculeRepository::class)]
class Vehicule
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 10)]
    private $immatriculation;

    #[ORM\Column(type: 'date')]
    private $immatriculationAt;

    #[ORM\Column(type: 'string', length: 255)]
    private $titulaire1;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $titulaire2;

    #[ORM\Column(type: 'string', length: 255)]
    private $titulaire_adresse;

    #[ORM\Column(type: 'string', length: 100)]
    private $marque;

    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private $version;

    #[ORM\Column(type: 'string', length: 50, nullable: true)]
    private $d21_codecni;

    #[ORM\Column(type: 'string', length: 50, nullable: true)]
    private $d3_commerial;

    #[ORM\Column(type: 'string', length: 50)]
    private $numero_VIN;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $f1_ptac;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $f3_ptra;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $g1_poidsvide;

    #[ORM\Column(type: 'date')]
    private $i_certificatAt;

    #[ORM\Column(type: 'string', length: 10, nullable: true)]
    private $j1_genre;

    #[ORM\Column(type: 'string', length: 10, nullable: true)]
    private $j2_carrosserie;

    #[ORM\Column(type: 'string', length: 10, nullable: true)]
    private $j3_nat;

    #[ORM\Column(type: 'string', length: 50, nullable: true)]
    private $k_reception;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $p1_cylindree;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $p2_kw;

    #[ORM\Column(type: 'string', length: 50, nullable: true)]
    private $p3_energie;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $p6_cv;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $s1_assis;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $s2_debout;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $u1_db;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $u2_moteur;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $v7_co2;

    #[ORM\Column(type: 'string', length: 50, nullable: true)]
    private $v9_cee;

    #[ORM\Column(type: 'date')]
    private $controleAt;

    #[ORM\Column(type: 'decimal', precision: 5, scale: 2, nullable: true)]
    private $longueur;

    #[ORM\Column(type: 'decimal', precision: 5, scale: 2, nullable: true)]
    private $largeur;

    #[ORM\Column(type: 'decimal', precision: 5, scale: 2, nullable: true)]
    private $hauteur;

    #[ORM\Column(type: 'string', length: 50, nullable: true)]
    private $transmission;

    #[ORM\Column(type: 'string', length: 50, nullable: true)]
    private $boite;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $nbvitesse;

    #[ORM\Column(type: 'string', length: 50, nullable: true)]
    private $couleur;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $reservoir;

    #[ORM\Column(type: 'decimal', precision: 5, scale: 2, nullable: true)]
    private $conso_urbaine;

    #[ORM\Column(type: 'decimal', precision: 5, scale: 2, nullable: true)]
    private $conso_mixte;

    #[ORM\Column(type: 'date', nullable: true)]
    private $achatAt;

    #[ORM\Column(type: 'date', nullable: true)]
    private $venteAt;

    #[ORM\Column(type: 'decimal', precision: 6, scale: 2, nullable: true)]
    private $valeur;

    #[ORM\Column(type: 'string', length: 50, nullable: true)]
    private $pneumatiques;

    #[ORM\OneToMany(mappedBy: 'vehicule', targetEntity: Assurance::class)]
    private $assurance;

    #[ORM\OneToMany(mappedBy: 'vehicule', targetEntity: Entretien::class)]
    private $entretiens;

    public function __construct()
    {
        $this->assurance = new ArrayCollection();
        $this->entretiens = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImmatriculation(): ?string
    {
        return $this->immatriculation;
    }

    public function setImmatriculation(string $immatriculation): self
    {
        $this->immatriculation = $immatriculation;

        return $this;
    }

    public function getImmatriculationAt(): ?\DateTimeInterface
    {
        return $this->immatriculationAt;
    }

    public function setImmatriculationAt(\DateTimeInterface $immatriculationAt): self
    {
        $this->immatriculationAt = $immatriculationAt;

        return $this;
    }

    public function getTitulaire1(): ?string
    {
        return $this->titulaire1;
    }

    public function setTitulaire1(string $titulaire1): self
    {
        $this->titulaire1 = $titulaire1;

        return $this;
    }

    public function getTitulaire2(): ?string
    {
        return $this->titulaire2;
    }

    public function setTitulaire2(?string $titulaire2): self
    {
        $this->titulaire2 = $titulaire2;

        return $this;
    }

    public function getTitulaireAdresse(): ?string
    {
        return $this->titulaire_adresse;
    }

    public function setTitulaireAdresse(string $titulaire_adresse): self
    {
        $this->titulaire_adresse = $titulaire_adresse;

        return $this;
    }

    public function getMarque(): ?string
    {
        return $this->marque;
    }

    public function setMarque(string $marque): self
    {
        $this->marque = $marque;

        return $this;
    }

    public function getVersion(): ?string
    {
        return $this->version;
    }

    public function setVersion(?string $version): self
    {
        $this->version = $version;

        return $this;
    }

    public function getD21Codecni(): ?string
    {
        return $this->d21_codecni;
    }

    public function setD21Codecni(?string $d21_codecni): self
    {
        $this->d21_codecni = $d21_codecni;

        return $this;
    }

    public function getD3Commerial(): ?string
    {
        return $this->d3_commerial;
    }

    public function setD3Commerial(?string $d3_commerial): self
    {
        $this->d3_commerial = $d3_commerial;

        return $this;
    }

    public function getNumeroVIN(): ?string
    {
        return $this->numero_VIN;
    }

    public function setNumeroVIN(string $numero_VIN): self
    {
        $this->numero_VIN = $numero_VIN;

        return $this;
    }

    public function getF1Ptac(): ?int
    {
        return $this->f1_ptac;
    }

    public function setF1Ptac(?int $f1_ptac): self
    {
        $this->f1_ptac = $f1_ptac;

        return $this;
    }

    public function getF3Ptra(): ?int
    {
        return $this->f3_ptra;
    }

    public function setF3Ptra(?int $f3_ptra): self
    {
        $this->f3_ptra = $f3_ptra;

        return $this;
    }

    public function getG1Poidsvide(): ?int
    {
        return $this->g1_poidsvide;
    }

    public function setG1Poidsvide(?int $g1_poidsvide): self
    {
        $this->g1_poidsvide = $g1_poidsvide;

        return $this;
    }

    public function getICertificatAt(): ?\DateTimeInterface
    {
        return $this->i_certificatAt;
    }

    public function setICertificatAt(\DateTimeInterface $i_certificatAt): self
    {
        $this->i_certificatAt = $i_certificatAt;

        return $this;
    }

    public function getJ1Genre(): ?string
    {
        return $this->j1_genre;
    }

    public function setJ1Genre(?string $j1_genre): self
    {
        $this->j1_genre = $j1_genre;

        return $this;
    }

    public function getJ2Carrosserie(): ?string
    {
        return $this->j2_carrosserie;
    }

    public function setJ2Carrosserie(?string $j2_carrosserie): self
    {
        $this->j2_carrosserie = $j2_carrosserie;

        return $this;
    }

    public function getJ3Nat(): ?string
    {
        return $this->j3_nat;
    }

    public function setJ3Nat(?string $j3_nat): self
    {
        $this->j3_nat = $j3_nat;

        return $this;
    }

    public function getKReception(): ?string
    {
        return $this->k_reception;
    }

    public function setKReception(?string $k_reception): self
    {
        $this->k_reception = $k_reception;

        return $this;
    }

    public function getP1Cylindree(): ?int
    {
        return $this->p1_cylindree;
    }

    public function setP1Cylindree(?int $p1_cylindree): self
    {
        $this->p1_cylindree = $p1_cylindree;

        return $this;
    }

    public function getP2Kw(): ?int
    {
        return $this->p2_kw;
    }

    public function setP2Kw(?int $p2_kw): self
    {
        $this->p2_kw = $p2_kw;

        return $this;
    }

    public function getP3Energie(): ?string
    {
        return $this->p3_energie;
    }

    public function setP3Energie(?string $p3_energie): self
    {
        $this->p3_energie = $p3_energie;

        return $this;
    }

    public function getP6Cv(): ?int
    {
        return $this->p6_cv;
    }

    public function setP6Cv(?int $p6_cv): self
    {
        $this->p6_cv = $p6_cv;

        return $this;
    }

    public function getS1Assis(): ?int
    {
        return $this->s1_assis;
    }

    public function setS1Assis(?int $s1_assis): self
    {
        $this->s1_assis = $s1_assis;

        return $this;
    }

    public function getS2Debout(): ?int
    {
        return $this->s2_debout;
    }

    public function setS2Debout(?int $s2_debout): self
    {
        $this->s2_debout = $s2_debout;

        return $this;
    }

    public function getU1Db(): ?int
    {
        return $this->u1_db;
    }

    public function setU1Db(?int $u1_db): self
    {
        $this->u1_db = $u1_db;

        return $this;
    }

    public function getU2Moteur(): ?int
    {
        return $this->u2_moteur;
    }

    public function setU2Moteur(?int $u2_moteur): self
    {
        $this->u2_moteur = $u2_moteur;

        return $this;
    }

    public function getV7Co2(): ?int
    {
        return $this->v7_co2;
    }

    public function setV7Co2(?int $v7_co2): self
    {
        $this->v7_co2 = $v7_co2;

        return $this;
    }

    public function getV9Cee(): ?string
    {
        return $this->v9_cee;
    }

    public function setV9Cee(?string $v9_cee): self
    {
        $this->v9_cee = $v9_cee;

        return $this;
    }

    public function getControleAt(): ?\DateTimeInterface
    {
        return $this->controleAt;
    }

    public function setControleAt(\DateTimeInterface $controleAt): self
    {
        $this->controleAt = $controleAt;

        return $this;
    }

    public function getLongueur(): ?string
    {
        return $this->longueur;
    }

    public function setLongueur(?string $longueur): self
    {
        $this->longueur = $longueur;

        return $this;
    }

    public function getLargeur(): ?string
    {
        return $this->largeur;
    }

    public function setLargeur(?string $largeur): self
    {
        $this->largeur = $largeur;

        return $this;
    }

    public function getHauteur(): ?string
    {
        return $this->hauteur;
    }

    public function setHauteur(?string $hauteur): self
    {
        $this->hauteur = $hauteur;

        return $this;
    }

    public function getTransmission(): ?string
    {
        return $this->transmission;
    }

    public function setTransmission(?string $transmission): self
    {
        $this->transmission = $transmission;

        return $this;
    }

    public function getBoite(): ?string
    {
        return $this->boite;
    }

    public function setBoite(?string $boite): self
    {
        $this->boite = $boite;

        return $this;
    }

    public function getNbvitesse(): ?int
    {
        return $this->nbvitesse;
    }

    public function setNbvitesse(?int $nbvitesse): self
    {
        $this->nbvitesse = $nbvitesse;

        return $this;
    }

    public function getCouleur(): ?string
    {
        return $this->couleur;
    }

    public function setCouleur(?string $couleur): self
    {
        $this->couleur = $couleur;

        return $this;
    }

    public function getReservoir(): ?int
    {
        return $this->reservoir;
    }

    public function setReservoir(?int $reservoir): self
    {
        $this->reservoir = $reservoir;

        return $this;
    }

    public function getConsoUrbaine(): ?string
    {
        return $this->conso_urbaine;
    }

    public function setConsoUrbaine(?string $conso_urbaine): self
    {
        $this->conso_urbaine = $conso_urbaine;

        return $this;
    }

    public function getConsoMixte(): ?string
    {
        return $this->conso_mixte;
    }

    public function setConsoMixte(?string $conso_mixte): self
    {
        $this->conso_mixte = $conso_mixte;

        return $this;
    }

    public function getAchatAt(): ?\DateTimeInterface
    {
        return $this->achatAt;
    }

    public function setAchatAt(?\DateTimeInterface $achatAt): self
    {
        $this->achatAt = $achatAt;

        return $this;
    }

    public function getVenteAt(): ?\DateTimeInterface
    {
        return $this->venteAt;
    }

    public function setVenteAt(?\DateTimeInterface $venteAt): self
    {
        $this->venteAt = $venteAt;

        return $this;
    }

    public function getValeur(): ?string
    {
        return $this->valeur;
    }

    public function setValeur(?string $valeur): self
    {
        $this->valeur = $valeur;

        return $this;
    }

    public function getPneumatiques(): ?string
    {
        return $this->pneumatiques;
    }

    public function setPneumatiques(?string $pneumatiques): self
    {
        $this->pneumatiques = $pneumatiques;

        return $this;
    }

    /**
     * @return Collection|Assurance[]
     */
    public function getAssurance(): Collection
    {
        return $this->assurance;
    }

    public function addAssurance(Assurance $assurance): self
    {
        if (!$this->assurance->contains($assurance)) {
            $this->assurance[] = $assurance;
            $assurance->setVehicule($this);
        }

        return $this;
    }

    public function removeAssurance(Assurance $assurance): self
    {
        if ($this->assurance->removeElement($assurance)) {
            // set the owning side to null (unless already changed)
            if ($assurance->getVehicule() === $this) {
                $assurance->setVehicule(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Entretien[]
     */
    public function getEntretiens(): Collection
    {
        return $this->entretiens;
    }

    public function addEntretien(Entretien $entretien): self
    {
        if (!$this->entretiens->contains($entretien)) {
            $this->entretiens[] = $entretien;
            $entretien->setVehicule($this);
        }

        return $this;
    }

    public function removeEntretien(Entretien $entretien): self
    {
        if ($this->entretiens->removeElement($entretien)) {
            // set the owning side to null (unless already changed)
            if ($entretien->getVehicule() === $this) {
                $entretien->setVehicule(null);
            }
        }

        return $this;
    }
}
