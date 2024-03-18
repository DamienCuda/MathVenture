<?php

namespace App\Entity;

use App\Repository\LevelRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LevelRepository::class)]
class Level
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $slug = null;

    #[ORM\OneToMany(targetEntity: Sublevel::class, mappedBy: 'ParentLevel')]
    private Collection $sublevels;

    public function __construct()
    {
        $this->sublevels = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, Sublevel>
     */
    public function getSublevels(): Collection
    {
        return $this->sublevels;
    }

    public function addSublevel(Sublevel $sublevel): static
    {
        if (!$this->sublevels->contains($sublevel)) {
            $this->sublevels->add($sublevel);
            $sublevel->setParentLevel($this);
        }

        return $this;
    }

    public function removeSublevel(Sublevel $sublevel): static
    {
        if ($this->sublevels->removeElement($sublevel)) {
            // set the owning side to null (unless already changed)
            if ($sublevel->getParentLevel() === $this) {
                $sublevel->setParentLevel(null);
            }
        }

        return $this;
    }
    public function __toString(): string
    {
        return $this->name;
    }
}
