<?php

namespace App\Entity;

use App\Repository\VehiculeRepository;
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

    #[ORM\Column(type: 'decimal', precision: 5, scale: 2, nullable: true)]
    private $longueur;

    #[ORM\Column(type: 'decimal', precision: 5, scale: 2, nullable: true)]
    private $largeur;

    #[ORM\Column(type: 'decimal', precision: 5, scale: 2, nullable: true)]
    private $hauteur;

    #[ORM\Column(type: 'decimal', precision: 6, scale: 2, nullable: true)]
    private $poids_vide;

    #[ORM\Column(type: 'decimal', precision: 5, scale: 2, nullable: true)]
    private $empattement;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $reservoir;

    #[ORM\Column(type: 'string', length: 20, nullable: true)]
    private $energie;

    #[ORM\Column(type: 'decimal', precision: 5, scale: 2, nullable: true)]
    private $co2;

    #[ORM\Column(type: 'decimal', precision: 5, scale: 2, nullable: true)]
    private $conso_urbaine;

    #[ORM\Column(type: 'decimal', precision: 5, scale: 2, nullable: true)]
    private $conso_mixte;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $cylindree;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $puissance_din;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $puissance_fiscal;

    #[ORM\Column(type: 'string', length: 20, nullable: true)]
    private $transmission;

    #[ORM\Column(type: 'string', length: 20, nullable: true)]
    private $boite_vitesse;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $nb_vitesse;

    #[ORM\Column(type: 'string', length: 20, nullable: true)]
    private $carrosserie;

    #[ORM\Column(type: 'string', length: 20, nullable: true)]
    private $pneumatiques;

    #[ORM\Column(type: 'datetime_immutable', nullable: true)]
    private $acheterAt;

    #[ORM\Column(type: 'datetime_immutable', nullable: true)]
    private $vendreAt;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2, nullable: true)]
    private $valeur_achat;

    #[ORM\Column(type: 'string', length: 20)]
    private $marque;

    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private $modele;

    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private $numero_identification;

    #[ORM\Column(type: 'string')]
    private $certificatPdf;

    #[ORM\Column(type: 'string')]
    private $assurancePdf;

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

    public function getPoidsVide(): ?string
    {
        return $this->poids_vide;
    }

    public function setPoidsVide(?string $poids_vide): self
    {
        $this->poids_vide = $poids_vide;

        return $this;
    }

    public function getEmpattement(): ?string
    {
        return $this->empattement;
    }

    public function setEmpattement(?string $empattement): self
    {
        $this->empattement = $empattement;

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

    public function getEnergie(): ?string
    {
        return $this->energie;
    }

    public function setEnergie(?string $energie): self
    {
        $this->energie = $energie;

        return $this;
    }

    public function getCo2(): ?string
    {
        return $this->co2;
    }

    public function setCo2(?string $co2): self
    {
        $this->co2 = $co2;

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

    public function getCylindree(): ?int
    {
        return $this->cylindree;
    }

    public function setCylindree(?int $cylindree): self
    {
        $this->cylindree = $cylindree;

        return $this;
    }

    public function getPuissanceDin(): ?int
    {
        return $this->puissance_din;
    }

    public function setPuissanceDin(?int $puissance_din): self
    {
        $this->puissance_din = $puissance_din;

        return $this;
    }

    public function getPuissanceFiscal(): ?int
    {
        return $this->puissance_fiscal;
    }

    public function setPuissanceFiscal(?int $puissance_fiscal): self
    {
        $this->puissance_fiscal = $puissance_fiscal;

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

    public function getBoiteVitesse(): ?string
    {
        return $this->boite_vitesse;
    }

    public function setBoiteVitesse(?string $boite_vitesse): self
    {
        $this->boite_vitesse = $boite_vitesse;

        return $this;
    }

    public function getNbVitesse(): ?int
    {
        return $this->nb_vitesse;
    }

    public function setNbVitesse(?int $nb_vitesse): self
    {
        $this->nb_vitesse = $nb_vitesse;

        return $this;
    }

    public function getCarrosserie(): ?string
    {
        return $this->carrosserie;
    }

    public function setCarrosserie(?string $carrosserie): self
    {
        $this->carrosserie = $carrosserie;

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

    public function getAcheterAt(): ?\DateTimeImmutable
    {
        return $this->acheterAt;
    }

    public function setAcheterAt(?\DateTimeImmutable $acheterAt): self
    {
        $this->acheterAt = $acheterAt;

        return $this;
    }

    public function getVendreAt(): ?\DateTimeImmutable
    {
        return $this->vendreAt;
    }

    public function setVendreAt(?\DateTimeImmutable $vendreAt): self
    {
        $this->vendreAt = $vendreAt;

        return $this;
    }

    public function getValeurAchat(): ?string
    {
        return $this->valeur_achat;
    }

    public function setValeurAchat(?string $valeur_achat): self
    {
        $this->valeur_achat = $valeur_achat;

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

    public function getModele(): ?string
    {
        return $this->modele;
    }

    public function setModele(?string $modele): self
    {
        $this->modele = $modele;

        return $this;
    }

    public function getNumeroIdentification(): ?string
    {
        return $this->numero_identification;
    }

    public function setNumeroIdentification(?string $numero_identification): self
    {
        $this->numero_identification = $numero_identification;

        return $this;
    }

    public function getCertificatPdf()
    {
        return $this->certificatPdf;
    }

    public function setCertificatPdf($certificatPdf)
    {
        $this->certificatPdf = $certificatPdf;

        return $this;
    }

    public function getAssurancePdf()
    {
        return $this->assurancePdf;
    }

    public function setAssurancePdf($assurancePdf)
    {
        $this->assurancePdf = $assurancePdf;

        return $this;
    }
}
