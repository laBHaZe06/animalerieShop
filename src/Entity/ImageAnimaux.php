<?php

namespace App\Entity;

use App\Repository\ImageAnimauxRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ImageAnimauxRepository::class)
 */
class ImageAnimaux
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
    private $url;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $legend;

    /**
     * @ORM\ManyToOne(targetEntity=Animaux::class, inversedBy="imageAnimauxes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $animaux;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getLegend(): ?string
    {
        return $this->legend;
    }

    public function setLegend(?string $legend): self
    {
        $this->legend = $legend;

        return $this;
    }

    public function getAnimaux(): ?Animaux
    {
        return $this->animaux;
    }

    public function setAnimaux(?Animaux $animaux): self
    {
        $this->animaux = $animaux;

        return $this;
    }
}
