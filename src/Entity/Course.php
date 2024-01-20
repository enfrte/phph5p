<?php

namespace App\Entity;

use App\Repository\CourseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CourseRepository::class)]
class Course
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $courseName = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\ManyToOne(inversedBy: 'courses')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $userId = null;

    #[ORM\OneToMany(mappedBy: 'course', targetEntity: CourseModule::class, orphanRemoval: true)]
    private Collection $courseModules;

    #[ORM\OneToMany(mappedBy: 'course', targetEntity: UserResponses::class, orphanRemoval: true)]
    private Collection $userResponses;

    #[ORM\OneToMany(mappedBy: 'course', targetEntity: UserCourse::class, orphanRemoval: true)]
    private Collection $userCourses;

    public function __construct() {
        $this->createdAt = new \DateTimeImmutable();
        $this->courseModules = new ArrayCollection();
        $this->userResponses = new ArrayCollection();
        $this->userCourses = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCourseName(): ?string
    {
        return $this->courseName;
    }

    public function setCourseName(string $courseName): static
    {
        $this->courseName = $courseName;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getUserId(): ?User
    {
        return $this->userId;
    }

    public function setUserId(?User $userId): static
    {
        $this->userId = $userId;

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
            $courseModule->setCourse($this);
        }

        return $this;
    }

    public function removeCourseModule(CourseModule $courseModule): static
    {
        if ($this->courseModules->removeElement($courseModule)) {
            // set the owning side to null (unless already changed)
            if ($courseModule->getCourse() === $this) {
                $courseModule->setCourse(null);
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
            $userResponse->setCourse($this);
        }

        return $this;
    }

    public function removeUserResponse(UserResponses $userResponse): static
    {
        if ($this->userResponses->removeElement($userResponse)) {
            // set the owning side to null (unless already changed)
            if ($userResponse->getCourse() === $this) {
                $userResponse->setCourse(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, UserCourse>
     */
    public function getUserCourses(): Collection
    {
        return $this->userCourses;
    }

    public function addUserCourse(UserCourse $userCourse): static
    {
        if (!$this->userCourses->contains($userCourse)) {
            $this->userCourses->add($userCourse);
            $userCourse->setCourse($this);
        }

        return $this;
    }

    public function removeUserCourse(UserCourse $userCourse): static
    {
        if ($this->userCourses->removeElement($userCourse)) {
            // set the owning side to null (unless already changed)
            if ($userCourse->getCourse() === $this) {
                $userCourse->setCourse(null);
            }
        }

        return $this;
    }
}
