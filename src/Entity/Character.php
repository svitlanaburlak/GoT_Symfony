<?php

namespace App\Entity;

use App\Repository\CharacterRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CharacterRepository::class)
 */
class Character
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    /**
     * @ORM\Column(type="text")
     */
    private $biography;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @ORM\ManyToOne(targetEntity=Title::class, inversedBy="characters")
     */
    private $title;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $motherId;

    /**
     * @ORM\ManyToOne(targetEntity=Character::class)
     */
    private $fatherId;

    /**
     * @ORM\ManyToMany(targetEntity=House::class, inversedBy="characters")
     */
    private $house;

    public function __construct()
    {
        $this->house = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->firstname;
    }

    public function setFirstName(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastname;
    }

    public function setLastName(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getBiography(): ?string
    {
        return $this->biography;
    }

    public function setBiography(string $biography): self
    {
        $this->biography = $biography;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getTitle(): ?Title
    {
        return $this->title;
    }

    public function setTitle(?Title $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getMotherId(): ?int
    {
        return $this->motherId;
    }

    public function setMotherId(?int $motherId): self
    {
        $this->motherId = $motherId;

        return $this;
    }

    public function getFatherId(): ?self
    {
        return $this->fatherId;
    }

    public function setFatherId(?self $fatherId): self
    {
        $this->fatherId = $fatherId;

        return $this;
    }

    /**
     * @return Collection<int, House>
     */
    public function getHouse(): Collection
    {
        return $this->house;
    }

    public function addHouse(House $house): self
    {
        if (!$this->house->contains($house)) {
            $this->house[] = $house;
        }

        return $this;
    }

    public function removeHouse(House $house): self
    {
        $this->house->removeElement($house);

        return $this;
    }
}