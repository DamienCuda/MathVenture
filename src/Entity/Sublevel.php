<?php

namespace App\Entity;

use App\Repository\SublevelRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SublevelRepository::class)]
class Sublevel
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $slug = null;

    #[ORM\ManyToOne(inversedBy: 'sublevels')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Level $ParentLevel = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): static
    {
        $this->slug = $slug;

        return $this;
    }

    public function getParentLevel(): ?Level
    {
        return $this->ParentLevel;
    }

    public function setParentLevel(?Level $ParentLevel): static
    {
        $this->ParentLevel = $ParentLevel;

        return $this;
    }
}
