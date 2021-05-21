<?php

namespace App\Entity;

use App\Entity\Accessoire;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use App\Repository\CategoryAnimauxRepository;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass=CategoryAnimauxRepository::class)
 */
class CategoryAnimaux
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
    private $type;


    /**
     * @ORM\OneToMany(targetEntity=Animaux::class, mappedBy="categoryAnimaux")
     */
    private $category;

    /**
     * @ORM\OneToMany(targetEntity=Accessoire::class, mappedBy="categoryAnimaux")
     */
    private $accessoires;


    public function __construct()
    {
        $this->category = new ArrayCollection();
        $this->accessoires = new ArrayCollection();
       
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }


    /**
     * @return Collection|Animaux[]
     */
    public function getCategory(): Collection
    {
        return $this->category;
    }

    public function addCategory(Animaux $category): self
    {
        if (!$this->category->contains($category)) {
            $this->category[] = $category;
            $category->setCategoryAnimaux($this);
        }

        return $this;
    }

    public function removeCategory(Animaux $category): self
    {
        if ($this->category->removeElement($category)) {
            // set the owning side to null (unless already changed)
            if ($category->getCategoryAnimaux() === $this) {
                $category->setCategoryAnimaux(null);
            }
        }

        return $this;

    }

    /**
     * @return Collection|Accessoire[]
     */
    public function getAccessoires(): Collection
    {
        return $this->accessoires;
    }

    public function addAccessoire(Accessoire $accessoire): self
    {
        if (!$this->accessoires->contains($accessoire)) {
            $this->accessoires[] = $accessoire;
            $accessoire->setCategoryAnimaux($this);
        }

        return $this;
    }

    public function removeAccessoire(Accessoire $accessoire): self
    {
        if ($this->accessoires->removeElement($accessoire)) {
            // set the owning side to null (unless already changed)
            if ($accessoire->getCategoryAnimaux() === $this) {
                $accessoire->setCategoryAnimaux(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->type;
    }
   
 
    
}
