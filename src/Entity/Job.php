<?php

namespace App\Entity;

use App\Repository\JobRepository;
use App\Doctrine\DBAL\Types\JobStatusType;
use Doctrine\ORM\Mapping as ORM;
use Fresh\DoctrineEnumBundle\Validator\Constraints as DoctrineAssert;

#[ORM\Entity(repositoryClass: JobRepository::class)]
class Job
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 150, nullable: true)]
    private $summary = '';

    #[ORM\Column(type: 'string', length: 500)]
    private $description;

    #[ORM\Column(type: 'JobStatusType', length: 20, options: ["default" => 'open'])]
    #[DoctrineAssert\EnumType(entity: JobStatusType::class)]
    private $status;

    #[ORM\Column(type: 'string', length: 30)]
    private $firstName;

    #[ORM\Column(type: 'string', length: 30)]
    private $lastName;

    #[ORM\Column(type: 'string', length: 120)]
    private $email;

    #[ORM\ManyToOne(targetEntity: Property::class, inversedBy: 'jobs')]
    #[ORM\JoinColumn(nullable: false)]
    private $property;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSummary(): ?string
    {
        return $this->summary;
    }

    public function setSummary(?string $summary): self
    {
        $this->summary = $summary;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        JobStatusType::assertValidChoice($status);

        $this->status = $status;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
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

    public function getProperty(): ?Property
    {
        return $this->property;
    }

    public function setProperty(?Property $property): self
    {
        $this->property = $property;

        return $this;
    }
}
