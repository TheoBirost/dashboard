<?php

namespace App\Entity;

use App\Repository\ArgentRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArgentRepository::class)]
class Argent
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    // Le montant total des revenus
    #[ORM\Column(type: "decimal", precision: 10, scale: 2, nullable: true)]
    private ?float $revenus = null;

    // Le montant total des dépenses
    #[ORM\Column(type: "decimal", precision: 10, scale: 2, nullable: true)]
    private ?float $depenses = null;

    // Le solde actuel (revenus - dépenses)
    #[ORM\Column(type: "decimal", precision: 10, scale: 2, nullable: true)]
    private ?float $solde = null;

    // La description de l'activité (revenus, dépenses, etc.)
    #[ORM\Column(type: "text", nullable: true)]
    private ?string $description = null;

    // La date de la transaction ou du bilan
    #[ORM\Column(type: "datetime", nullable: true)]
    private ?\DateTimeInterface $date = null;

    // Getter et Setter pour les différents champs
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRevenus(): ?float
    {
        return $this->revenus;
    }

    public function setRevenus(?float $revenus): self
    {
        $this->revenus = $revenus;
        return $this;
    }

    public function getDepenses(): ?float
    {
        return $this->depenses;
    }

    public function setDepenses(?float $depenses): self
    {
        $this->depenses = $depenses;
        return $this;
    }

    public function getSolde(): ?float
    {
        return $this->solde;
    }

    public function setSolde(?float $solde): self
    {
        $this->solde = $solde;
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

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(?\DateTimeInterface $date): self
    {
        $this->date = $date;
        return $this;
    }
}

