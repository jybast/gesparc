<?php

namespace App\Entity;

use App\Repository\ContraventionTypeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ContraventionTypeRepository::class)]
class ContraventionType
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $nom = null;

    #[ORM\Column(nullable: true)]
    private ?int $retrait_points = null;

    #[ORM\Column(nullable: true)]
    private ?bool $retrait_pc = null;

    #[ORM\ManyToOne(inversedBy: 'contraventionTypes')]
    private ?Contravention $contravention = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getRetraitPoints(): ?int
    {
        return $this->retrait_points;
    }

    public function setRetraitPoints(?int $retrait_points): self
    {
        $this->retrait_points = $retrait_points;

        return $this;
    }

    public function isRetraitPc(): ?bool
    {
        return $this->retrait_pc;
    }

    public function setRetraitPc(?bool $retrait_pc): self
    {
        $this->retrait_pc = $retrait_pc;

        return $this;
    }

    public function getContravention(): ?Contravention
    {
        return $this->contravention;
    }

    public function setContravention(?Contravention $contravention): self
    {
        $this->contravention = $contravention;

        return $this;
    }
}
