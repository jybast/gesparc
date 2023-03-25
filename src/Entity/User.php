<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\UserRepository;
use App\Entity\Traits\CreatedAtTrait;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[UniqueEntity(fields: ['email'], message: 'There is already an account with this email')]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    use CreatedAtTrait;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    private ?string $email = null;

    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom = null;

    #[ORM\Column(length: 255)]
    private ?string $rue = null;

    #[ORM\Column(length: 255)]
    private ?string $ville = null;

    #[ORM\Column(length: 10)]
    private ?string $cp = null;

    #[ORM\Column(length: 20)]
    private ?string $tel = null;

    #[ORM\Column(type: 'boolean')]
    private $isVerified = false;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dat_naissance = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $num_pc = null;

    #[ORM\Column(nullable: true)]
    private ?int $nb_points = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $cat_pc = null;

    #[ORM\Column(nullable: true)]
    private ?bool $valid_pc = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $cat_caces = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dat_pc = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dat_caces = null;

    #[ORM\Column(nullable: true)]
    private ?bool $valid_caces = null;

    #[ORM\OneToMany(mappedBy: 'conducteur', targetEntity: Carnet::class)]
    private Collection $carnetdebord;

    #[ORM\OneToMany(mappedBy: 'conducteur', targetEntity: Contravention::class)]
    private Collection $contraventions;

    #[ORM\OneToMany(mappedBy: 'conducteur', targetEntity: Sinistre::class)]
    private Collection $sinistres;



    public function __construct()
    {
        $this->created_at = new \DateTimeImmutable();
        $this->carnetdebord = new ArrayCollection();
        $this->contraventions = new ArrayCollection();
        $this->sinistres = new ArrayCollection();
    }
    public function __toString()
    {
        return $this->prenom . ' ' . $this->nom;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // Chaque utilisateur a au minimum le ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getRue(): ?string
    {
        return $this->rue;
    }

    public function setRue(string $rue): self
    {
        $this->rue = $rue;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getCp(): ?string
    {
        return $this->cp;
    }

    public function setCp(string $cp): self
    {
        $this->cp = $cp;

        return $this;
    }

    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function setTel(string $tel): self
    {
        $this->tel = $tel;

        return $this;
    }

    public function isVerified(): bool
    {
        return $this->isVerified;
    }

    public function setIsVerified(bool $isVerified): self
    {
        $this->isVerified = $isVerified;

        return $this;
    }

    public function getDatNaissance(): ?\DateTimeInterface
    {
        return $this->dat_naissance;
    }

    public function setDatNaissance(?\DateTimeInterface $dat_naissance): self
    {
        $this->dat_naissance = $dat_naissance;

        return $this;
    }

    public function getNumPc(): ?string
    {
        return $this->num_pc;
    }

    public function setNumPc(?string $num_pc): self
    {
        $this->num_pc = $num_pc;

        return $this;
    }

    public function getNbPoints(): ?int
    {
        return $this->nb_points;
    }

    public function setNbPoints(?int $nb_points): self
    {
        $this->nb_points = $nb_points;

        return $this;
    }

    public function getCatPc(): ?string
    {
        return $this->cat_pc;
    }

    public function setCatPc(?string $cat_pc): self
    {
        $this->cat_pc = $cat_pc;

        return $this;
    }

    public function isValidPc(): ?bool
    {
        return $this->valid_pc;
    }

    public function setValidPc(?bool $valid_pc): self
    {
        $this->valid_pc = $valid_pc;

        return $this;
    }

    public function getCatCaces(): ?string
    {
        return $this->cat_caces;
    }

    public function setCatCaces(string $cat_caces): self
    {
        $this->cat_caces = $cat_caces;

        return $this;
    }

    public function getDatPc(): ?\DateTimeInterface
    {
        return $this->dat_pc;
    }

    public function setDatPc(?\DateTimeInterface $dat_pc): self
    {
        $this->dat_pc = $dat_pc;

        return $this;
    }

    public function getDatCaces(): ?\DateTimeInterface
    {
        return $this->dat_caces;
    }

    public function setDatCaces(?\DateTimeInterface $dat_caces): self
    {
        $this->dat_caces = $dat_caces;

        return $this;
    }

    public function isValidCaces(): ?bool
    {
        return $this->valid_caces;
    }

    public function setValidCaces(?bool $valid_caces): self
    {
        $this->valid_caces = $valid_caces;

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
            $carnetdebord->setConducteur($this);
        }

        return $this;
    }

    public function removeCarnetdebord(Carnet $carnetdebord): self
    {
        if ($this->carnetdebord->removeElement($carnetdebord)) {
            // set the owning side to null (unless already changed)
            if ($carnetdebord->getConducteur() === $this) {
                $carnetdebord->setConducteur(null);
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
            $contravention->setConducteur($this);
        }

        return $this;
    }

    public function removeContravention(Contravention $contravention): self
    {
        if ($this->contraventions->removeElement($contravention)) {
            // set the owning side to null (unless already changed)
            if ($contravention->getConducteur() === $this) {
                $contravention->setConducteur(null);
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
            $sinistre->setConducteur($this);
        }

        return $this;
    }

    public function removeSinistre(Sinistre $sinistre): self
    {
        if ($this->sinistres->removeElement($sinistre)) {
            // set the owning side to null (unless already changed)
            if ($sinistre->getConducteur() === $this) {
                $sinistre->setConducteur(null);
            }
        }

        return $this;
    }
}
