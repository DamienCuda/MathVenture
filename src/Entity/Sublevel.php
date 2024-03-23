<?php

namespace App\Entity;

use App\Repository\SublevelRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    #[ORM\Column(nullable: true)]
    private ?int $sublevelorder = null;

    #[ORM\OneToMany(targetEntity: Course::class, mappedBy: 'sublevel')]
    private Collection $courses;

    public function __construct()
    {
        $this->courses = new ArrayCollection();
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

    public function getParentLevel(): ?Level
    {
        return $this->ParentLevel;
    }

    public function setParentLevel(?Level $ParentLevel): static
    {
        $this->ParentLevel = $ParentLevel;

        return $this;
    }

    public function getSublevelorder(): ?int
    {
        return $this->sublevelorder;
    }

    public function setSublevelorder(?int $sublevelorder): static
    {
        $this->sublevelorder = $sublevelorder;

        return $this;
    }

    /**
     * @return Collection<int, Course>
     */
    public function getCourses(): Collection
    {
        return $this->courses;
    }

    public function addCourse(Course $course): static
    {
        if (!$this->courses->contains($course)) {
            $this->courses->add($course);
            $course->setSublevel($this);
        }

        return $this;
    }

    public function removeCourse(Course $course): static
    {
        if ($this->courses->removeElement($course)) {
            // set the owning side to null (unless already changed)
            if ($course->getSublevel() === $this) {
                $course->setSublevel(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->name;
    }
}
