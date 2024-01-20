<?php

namespace App\Entity;

use App\Repository\UserResponsesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserResponsesRepository::class)]
class UserResponses
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'userResponses')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    #[ORM\ManyToOne(inversedBy: 'userResponses')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Course $course = null;

    #[ORM\ManyToOne(inversedBy: 'userResponses')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Module $module = null;

    #[ORM\Column(length: 255)]
    private ?string $questionRef = null;

    #[ORM\Column(length: 5000, nullable: true)]
    private ?string $answer = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $responseTime = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getCourse(): ?Course
    {
        return $this->course;
    }

    public function setCourse(?Course $course): static
    {
        $this->course = $course;

        return $this;
    }

    public function getModule(): ?Module
    {
        return $this->module;
    }

    public function setModule(?Module $module): static
    {
        $this->module = $module;

        return $this;
    }

    public function getQuestionRef(): ?string
    {
        return $this->questionRef;
    }

    public function setQuestionRef(string $questionRef): static
    {
        $this->questionRef = $questionRef;

        return $this;
    }

    public function getAnswer(): ?string
    {
        return $this->answer;
    }

    public function setAnswer(?string $answer): static
    {
        $this->answer = $answer;

        return $this;
    }

    public function getResponseTime(): ?\DateTimeImmutable
    {
        return $this->responseTime;
    }

    public function setResponseTime(\DateTimeImmutable $responseTime): static
    {
        $this->responseTime = $responseTime;

        return $this;
    }
}
