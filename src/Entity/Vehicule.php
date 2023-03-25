<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\VehiculeRepository;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

use function PHPUnit\Framework\assertTrue;

#[ORM\Entity(repositoryClass: VehiculeRepository::class)]
#[UniqueEntity('a_immatriculation')]
class Vehicule
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 10, unique: true)]
    private ?string $a_immatriculation = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $b_pmc = null;

    #[ORM\Column(length: 255)]
    private ?string $c1_titulaire = null;

    #[ORM\Column(length: 255)]
    private ?string $c4_adresse = null;

    #[ORM\Column(length: 50)]
    private ?string $d1_marque = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $d2_version = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $d21_cnit = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $d3_commercial = null;

    #[ORM\Column(length: 50)]
    private ?string $e_vin = null;

    #[ORM\Column]
    private ?int $f1_ptac = null;

    #[ORM\Column(nullable: true)]
    private ?int $f2_masse = null;

    #[ORM\Column(nullable: true)]
    private ?int $f3_ptra = null;

    #[ORM\Column(nullable: true)]
    private ?int $g1_poidsvide = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $h_validite = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $i_datcertificat = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $j1_genre = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $j2_carrosserie_ce = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $j3_carrosserie = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $k_reception = null;

    #[ORM\Column(nullable: true)]
    private ?int $p1_cylindree = null;

    #[ORM\Column(nullable: true)]
    private ?int $p2_puissance = null;

    #[ORM\Column(length: 20)]
    private ?string $p3_energie = null;

    #[ORM\Column]
    private ?int $p6_fiscal = null;

    #[ORM\Column(nullable: true)]
    private ?int $s1_assis = null;

    #[ORM\Column(nullable: true)]
    private ?int $s2_debout = null;

    #[ORM\Column(nullable: true)]
    private ?int $u1_db = null;

    #[ORM\Column(nullable: true)]
    private ?int $v7_co2 = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $v9_classe = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dat_entree_parc = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dat_sortie_parc = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2, nullable: true)]
    private ?string $valeur_achat = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $mode_achat = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $etat_achat = null;

    #[ORM\Column]
    private ?int $compteur_achat = null;

    #[ORM\Column]
    private ?int $compteur_actuel = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dat_compteur_actuel = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 5, scale: 2, nullable: true)]
    private ?string $conso_theorique = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 5, scale: 2)]
    private ?string $conso_reel = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $pneus = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 5, scale: 2, nullable: true)]
    private ?string $veh_long = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 5, scale: 2, nullable: true)]
    private ?string $veh_large = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 5, scale: 2, nullable: true)]
    private ?string $veh_haut = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dat_cont_tech = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dat_cont_frigo = null;

    #[ORM\Column(length: 5)]
    private ?string $cat_pc = null;

    #[ORM\ManyToOne(inversedBy: 'vehicule')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Structure $structure = null;

    #[ORM\OneToMany(mappedBy: 'vehicule', targetEntity: Carnet::class)]
    private Collection $carnetdebord;

    #[ORM\OneToMany(mappedBy: 'vehicule', targetEntity: Contravention::class)]
    private Collection $contraventions;

    #[ORM\OneToMany(mappedBy: 'vehicule', targetEntity: Assurance::class)]
    private Collection $assurances;

    #[ORM\OneToMany(mappedBy: 'vehicule', targetEntity: Sinistre::class)]
    private Collection $sinistres;

    #[ORM\OneToMany(mappedBy: 'vehicule', targetEntity: Entretien::class)]
    private Collection $entretiens;

    #[ORM\OneToMany(mappedBy: 'vehicule', targetEntity: Carte::class)]
    private Collection $cartes;

    public function __construct()
    {
        $this->carnetdebord = new ArrayCollection();
        $this->contraventions = new ArrayCollection();
        $this->assurances = new ArrayCollection();
        $this->sinistres = new ArrayCollection();
        $this->entretiens = new ArrayCollection();
        $this->cartes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAImmatriculation(): ?string
    {
        return $this->a_immatriculation;
    }

    public function setAImmatriculation(string $a_immatriculation): self
    {
        $this->a_immatriculation = $a_immatriculation;

        return $this;
    }

    public function getBPmc(): ?\DateTimeInterface
    {
        return $this->b_pmc;
    }

    public function setBPmc(\DateTimeInterface $b_pmc): self
    {
        $this->b_pmc = $b_pmc;

        return $this;
    }

    public function getC1Titulaire(): ?string
    {
        return $this->c1_titulaire;
    }

    public function setC1Titulaire(string $c1_titulaire): self
    {
        $this->c1_titulaire = $c1_titulaire;

        return $this;
    }

    public function getC4Adresse(): ?string
    {
        return $this->c4_adresse;
    }

    public function setC4Adresse(string $c4_adresse): self
    {
        $this->c4_adresse = $c4_adresse;

        return $this;
    }

    public function getD1Marque(): ?string
    {
        return $this->d1_marque;
    }

    public function setD1Marque(string $d1_marque): self
    {
        $this->d1_marque = $d1_marque;

        return $this;
    }

    public function getD2Version(): ?string
    {
        return $this->d2_version;
    }

    public function setD2Version(?string $d2_version): self
    {
        $this->d2_version = $d2_version;

        return $this;
    }

    public function getD21Cnit(): ?string
    {
        return $this->d21_cnit;
    }

    public function setD21Cnit(?string $d21_cnit): self
    {
        $this->d21_cnit = $d21_cnit;

        return $this;
    }

    public function getD3Commercial(): ?string
    {
        return $this->d3_commercial;
    }

    public function setD3Commercial(?string $d3_commercial): self
    {
        $this->d3_commercial = $d3_commercial;

        return $this;
    }

    public function getEVin(): ?string
    {
        return $this->e_vin;
    }

    public function setEVin(string $e_vin): self
    {
        $this->e_vin = $e_vin;

        return $this;
    }

    public function getF1Ptac(): ?int
    {
        return $this->f1_ptac;
    }

    public function setF1Ptac(int $f1_ptac): self
    {
        $this->f1_ptac = $f1_ptac;

        return $this;
    }

    public function getF2Masse(): ?int
    {
        return $this->f2_masse;
    }

    public function setF2Masse(?int $f2_masse): self
    {
        $this->f2_masse = $f2_masse;

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

    public function getHValidite(): ?\DateTimeInterface
    {
        return $this->h_validite;
    }

    public function setHValidite(?\DateTimeInterface $h_validite): self
    {
        $this->h_validite = $h_validite;

        return $this;
    }

    public function getIDatcertificat(): ?\DateTimeInterface
    {
        return $this->i_datcertificat;
    }

    public function setIDatcertificat(\DateTimeInterface $i_datcertificat): self
    {
        $this->i_datcertificat = $i_datcertificat;

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

    public function getJ2CarrosserieCe(): ?string
    {
        return $this->j2_carrosserie_ce;
    }

    public function setJ2CarrosserieCe(?string $j2_carrosserie_ce): self
    {
        $this->j2_carrosserie_ce = $j2_carrosserie_ce;

        return $this;
    }

    public function getJ3Carrosserie(): ?string
    {
        return $this->j3_carrosserie;
    }

    public function setJ3Carrosserie(?string $j3_carrosserie): self
    {
        $this->j3_carrosserie = $j3_carrosserie;

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

    public function getP2Puissance(): ?int
    {
        return $this->p2_puissance;
    }

    public function setP2Puissance(?int $p2_puissance): self
    {
        $this->p2_puissance = $p2_puissance;

        return $this;
    }

    public function getP3Energie(): ?string
    {
        return $this->p3_energie;
    }

    public function setP3Energie(string $p3_energie): self
    {
        $this->p3_energie = $p3_energie;

        return $this;
    }

    public function getP6Fiscal(): ?int
    {
        return $this->p6_fiscal;
    }

    public function setP6Fiscal(int $p6_fiscal): self
    {
        $this->p6_fiscal = $p6_fiscal;

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

    public function getV7Co2(): ?int
    {
        return $this->v7_co2;
    }

    public function setV7Co2(?int $v7_co2): self
    {
        $this->v7_co2 = $v7_co2;

        return $this;
    }

    public function getV9Classe(): ?string
    {
        return $this->v9_classe;
    }

    public function setV9Classe(?string $v9_classe): self
    {
        $this->v9_classe = $v9_classe;

        return $this;
    }

    public function getDatEntreeParc(): ?\DateTimeInterface
    {
        return $this->dat_entree_parc;
    }

    public function setDatEntreeParc(\DateTimeInterface $dat_entree_parc): self
    {
        $this->dat_entree_parc = $dat_entree_parc;

        return $this;
    }

    public function getDatSortieParc(): ?\DateTimeInterface
    {
        return $this->dat_sortie_parc;
    }

    public function setDatSortieParc(?\DateTimeInterface $dat_sortie_parc): self
    {
        $this->dat_sortie_parc = $dat_sortie_parc;

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

    public function getModeAchat(): ?string
    {
        return $this->mode_achat;
    }

    public function setModeAchat(?string $mode_achat): self
    {
        $this->mode_achat = $mode_achat;

        return $this;
    }

    public function getEtatAchat(): ?string
    {
        return $this->etat_achat;
    }

    public function setEtatAchat(?string $etat_achat): self
    {
        $this->etat_achat = $etat_achat;

        return $this;
    }

    public function getCompteurAchat(): ?int
    {
        return $this->compteur_achat;
    }

    public function setCompteurAchat(int $compteur_achat): self
    {
        $this->compteur_achat = $compteur_achat;

        return $this;
    }

    public function getCompteurActuel(): ?int
    {
        return $this->compteur_actuel;
    }

    public function setCompteurActuel(int $compteur_actuel): self
    {
        $this->compteur_actuel = $compteur_actuel;

        return $this;
    }

    public function getDatCompteurActuel(): ?\DateTimeInterface
    {
        return $this->dat_compteur_actuel;
    }

    public function setDatCompteurActuel(\DateTimeInterface $dat_compteur_actuel): self
    {
        $this->dat_compteur_actuel = $dat_compteur_actuel;

        return $this;
    }

    public function getConsoTheorique(): ?string
    {
        return $this->conso_theorique;
    }

    public function setConsoTheorique(?string $conso_theorique): self
    {
        $this->conso_theorique = $conso_theorique;

        return $this;
    }

    public function getConsoReel(): ?string
    {
        return $this->conso_reel;
    }

    public function setConsoReel(string $conso_reel): self
    {
        $this->conso_reel = $conso_reel;

        return $this;
    }

    public function getPneus(): ?string
    {
        return $this->pneus;
    }

    public function setPneus(?string $pneus): self
    {
        $this->pneus = $pneus;

        return $this;
    }

    public function getVehLong(): ?string
    {
        return $this->veh_long;
    }

    public function setVehLong(?string $veh_long): self
    {
        $this->veh_long = $veh_long;

        return $this;
    }

    public function getVehLarge(): ?string
    {
        return $this->veh_large;
    }

    public function setVehLarge(?string $veh_large): self
    {
        $this->veh_large = $veh_large;

        return $this;
    }

    public function getVehHaut(): ?string
    {
        return $this->veh_haut;
    }

    public function setVehHaut(?string $veh_haut): self
    {
        $this->veh_haut = $veh_haut;

        return $this;
    }

    public function getDatContTech(): ?\DateTimeInterface
    {
        return $this->dat_cont_tech;
    }

    public function setDatContTech(\DateTimeInterface $dat_cont_tech): self
    {
        $this->dat_cont_tech = $dat_cont_tech;

        return $this;
    }

    public function getDatContFrigo(): ?\DateTimeInterface
    {
        return $this->dat_cont_frigo;
    }

    public function setDatContFrigo(?\DateTimeInterface $dat_cont_frigo): self
    {
        $this->dat_cont_frigo = $dat_cont_frigo;

        return $this;
    }

    public function getCatPc(): ?string
    {
        return $this->cat_pc;
    }

    public function setCatPc(string $cat_pc): self
    {
        $this->cat_pc = $cat_pc;

        return $this;
    }

    public function getStructure(): ?Structure
    {
        return $this->structure;
    }

    public function setStructure(?Structure $structure): self
    {
        $this->structure = $structure;

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
            $carnetdebord->setVehicule($this);
        }

        return $this;
    }

    public function removeCarnetdebord(Carnet $carnetdebord): self
    {
        if ($this->carnetdebord->removeElement($carnetdebord)) {
            // set the owning side to null (unless already changed)
            if ($carnetdebord->getVehicule() === $this) {
                $carnetdebord->setVehicule(null);
            }
        }

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
            $contravention->setVehicule($this);
        }

        return $this;
    }

    public function removeContravention(Contravention $contravention): self
    {
        if ($this->contraventions->removeElement($contravention)) {
            // set the owning side to null (unless already changed)
            if ($contravention->getVehicule() === $this) {
                $contravention->setVehicule(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Assurance>
     */
    public function getAssurances(): Collection
    {
        return $this->assurances;
    }

    public function addAssurance(Assurance $assurance): self
    {
        if (!$this->assurances->contains($assurance)) {
            $this->assurances->add($assurance);
            $assurance->setVehicule($this);
        }

        return $this;
    }

    public function removeAssurance(Assurance $assurance): self
    {
        if ($this->assurances->removeElement($assurance)) {
            // set the owning side to null (unless already changed)
            if ($assurance->getVehicule() === $this) {
                $assurance->setVehicule(null);
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
            $sinistre->setVehicule($this);
        }

        return $this;
    }

    public function removeSinistre(Sinistre $sinistre): self
    {
        if ($this->sinistres->removeElement($sinistre)) {
            // set the owning side to null (unless already changed)
            if ($sinistre->getVehicule() === $this) {
                $sinistre->setVehicule(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Entretien>
     */
    public function getEntretiens(): Collection
    {
        return $this->entretiens;
    }

    public function addEntretien(Entretien $entretien): self
    {
        if (!$this->entretiens->contains($entretien)) {
            $this->entretiens->add($entretien);
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
            $carte->setVehicule($this);
        }

        return $this;
    }

    public function removeCarte(Carte $carte): self
    {
        if ($this->cartes->removeElement($carte)) {
            // set the owning side to null (unless already changed)
            if ($carte->getVehicule() === $this) {
                $carte->setVehicule(null);
            }
        }

        return $this;
    }
}
