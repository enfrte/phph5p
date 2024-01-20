<?php

namespace App\Entity;

use App\Repository\ModuleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ModuleRepository::class)]
class Module
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $moduleName = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\ManyToOne(inversedBy: 'modules')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    #[ORM\Column(length: 255)]
    private ?string $fileName = null;

    #[ORM\OneToMany(mappedBy: 'module', targetEntity: CourseModule::class, orphanRemoval: true)]
    private Collection $courseModules;

    #[ORM\OneToMany(mappedBy: 'module', targetEntity: UserResponses::class, orphanRemoval: true)]
    private Collection $userResponses;

    public function __construct()
    {
        $this->courseModules = new ArrayCollection();
        $this->userResponses = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getModuleName(): ?string
    {
        return $this->moduleName;
    }

    public function setModuleName(string $moduleName): static
    {
        $this->moduleName = $moduleName;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }

    public function getFileName(): ?string
    {
        return $this->fileName;
    }

    public function setFileName(string $fileName): static
    {
        $this->fileName = $fileName;

        return $this;
    }

    /**
     * @return Collection<int, CourseModule>
     */
    public function getCourseModules(): Collection
    {
        return $this->courseModules;
    }

    public function addCourseModule(CourseModule $courseModule): static
    {
        if (!$this->courseModules->contains($courseModule)) {
            $this->courseModules->add($courseModule);
            $courseModule->setModule($this);
        }

        return $this;
    }

    public function removeCourseModule(CourseModule $courseModule): static
    {
        if ($this->courseModules->removeElement($courseModule)) {
            // set the owning side to null (unless already changed)
            if ($courseModule->getModule() === $this) {
                $courseModule->setModule(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, UserResponses>
     */
    public function getUserResponses(): Collection
    {
        return $this->userResponses;
    }

    public function addUserResponse(UserResponses $userResponse): static
    {
        if (!$this->userResponses->contains($userResponse)) {
            $this->userResponses->add($userResponse);
            $userResponse->setModule($this);
        }

        return $this;
    }

    public function removeUserResponse(UserResponses $userResponse): static
    {
        if ($this->userResponses->removeElement($userResponse)) {
            // set the owning side to null (unless already changed)
            if ($userResponse->getModule() === $this) {
                $userResponse->setModule(null);
            }
        }

        return $this;
    }
}
