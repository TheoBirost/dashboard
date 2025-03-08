<?php

namespace App\Entity;

use App\Repository\SportRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SportRepository::class)]
class Sport
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    // Type de sport (course, muscu, foot, etc.)
    #[ORM\Column(type: "string", length: 50, nullable: true)]
    private ?string $typeSport = null;

    // La date de l'activité sportive
    #[ORM\Column(type: "datetime", nullable: true)]
    private ?\DateTimeInterface $dateSport = null;

    // Une description de l'activité
    #[ORM\Column(type: "text", nullable: true)]
    private ?string $description = null;

    // Getter et Setter pour les différents champs
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypeSport(): ?string
    {
        return $this->typeSport;
    }

    public function setTypeSport(?string $typeSport): self
    {
        $this->typeSport = $typeSport;
        return $this;
    }

    public function getDateSport(): ?\DateTimeInterface
    {
        return $this->dateSport;
    }

    public function setDateSport(?\DateTimeInterface $dateSport): self
    {
        $this->dateSport = $dateSport;
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
}
