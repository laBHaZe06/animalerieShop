<?php

namespace App\Entity;

use App\Repository\AccessoireRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AccessoireRepository::class)
 */
class Accessoire
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
    private $titre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="integer")
     */
    private $stock;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $status;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $coverImage;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $slug;

    /**
     * @ORM\Column(type="integer")
     */
    private $price;

    /**
     * @ORM\ManyToOne(targetEntity=CategoryAccessoire::class, inversedBy="category")
     * @ORM\JoinColumn(nullable=false)
     */
    private $categoryAccessoire;

    /**
     * @ORM\ManyToOne(targetEntity=CategoryAnimaux::class, inversedBy="accessoires")
     * @ORM\JoinColumn(nullable=false)
     */
    private $categoryAnimaux;

    /**
     * @ORM\OneToMany(targetEntity=ImageAccessoire::class, mappedBy="accessoire", orphanRemoval=true)
     */
    private $imageAccessoires;

    public function __construct()
    {
        $this->imageAccessoires = new ArrayCollection();
    }
   

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

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

    public function getStock(): ?int
    {
        return $this->stock;
    }

    public function setStock(int $stock): self
    {
        $this->stock = $stock;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getCoverImage(): ?string
    {
        return $this->coverImage;
    }

    public function setCoverImage(string $coverImage): self
    {
        $this->coverImage = $coverImage;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getCategoryAccessoire(): ?CategoryAccessoire
    {
        return $this->categoryAccessoire;
    }

    public function setCategoryAccessoire(?CategoryAccessoire $categoryAccessoire): self
    {
        $this->categoryAccessoire = $categoryAccessoire;

        return $this;
    }

    public function getCategoryAnimaux(): ?CategoryAnimaux
    {
        return $this->categoryAnimaux;
    }

    public function setCategoryAnimaux(?CategoryAnimaux $categoryAnimaux): self
    {
        $this->categoryAnimaux = $categoryAnimaux;

        return $this;
    }

    /**
     * @return Collection|ImageAccessoire[]
     */
    public function getImageAccessoires(): Collection
    {
        return $this->imageAccessoires;
    }

    public function addImageAccessoire(ImageAccessoire $imageAccessoire): self
    {
        if (!$this->imageAccessoires->contains($imageAccessoire)) {
            $this->imageAccessoires[] = $imageAccessoire;
            $imageAccessoire->setAccessoire($this);
        }

        return $this;
    }

    public function removeImageAccessoire(ImageAccessoire $imageAccessoire): self
    {
        if ($this->imageAccessoires->removeElement($imageAccessoire)) {
            // set the owning side to null (unless already changed)
            if ($imageAccessoire->getAccessoire() === $this) {
                $imageAccessoire->setAccessoire(null);
            }
        }

        return $this;
    }



}
