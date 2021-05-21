<?php

namespace App\Entity;

use App\Repository\AnimauxRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AnimauxRepository::class)
 */
class Animaux
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
    private $age;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $status;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $espece;

    /**
     * @ORM\Column(type="integer")
     */
    private $price;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $coverImage;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $slug;

    /**
     * @ORM\ManyToOne(targetEntity=CategoryAnimaux::class, inversedBy="category")
     * @ORM\JoinColumn(nullable=false)
     */
    private $categoryAnimaux;

    /**
     * @ORM\OneToMany(targetEntity=ImageAnimaux::class, mappedBy="animaux")
     */
    private $imageAnimauxes;



    public function __construct()
    {
        $this->accessoires = new ArrayCollection();
        $this->imageAnimauxes = new ArrayCollection();
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

    public function getAge(): ?string
    {
        return $this->age;
    }

    public function setAge(string $age): self
    {
        $this->age = $age;

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
        $this->status = $status;

        return $this;
    }

    public function getEspece(): ?string
    {
        return $this->espece;
    }

    public function setEspece(string $espece): self
    {
        $this->espece = $espece;

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
     * @return Collection|ImageAnimaux[]
     */
    public function getImageAnimauxes(): Collection
    {
        return $this->imageAnimauxes;
    }

    public function addImageAnimaux(ImageAnimaux $imageAnimaux): self
    {
        if (!$this->imageAnimauxes->contains($imageAnimaux)) {
            $this->imageAnimauxes[] = $imageAnimaux;
            $imageAnimaux->setAnimaux($this);
        }

        return $this;
    }

    public function removeImageAnimaux(ImageAnimaux $imageAnimaux): self
    {
        if ($this->imageAnimauxes->removeElement($imageAnimaux)) {
            // set the owning side to null (unless already changed)
            if ($imageAnimaux->getAnimaux() === $this) {
                $imageAnimaux->setAnimaux(null);
            }
        }

        return $this;
    }


   
    
}
