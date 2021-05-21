<?php

namespace App\Entity;

use App\Repository\ImageAccessoireRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ImageAccessoireRepository::class)
 */
class ImageAccessoire
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
     * @ORM\Column(type="string", length=255)
     */
    private $legend;

    /**
     * @ORM\ManyToOne(targetEntity=Accessoire::class, inversedBy="imageAccessoires")
     * @ORM\JoinColumn(nullable=false)
     */
    private $accessoire;

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

    public function setLegend(string $legend): self
    {
        $this->legend = $legend;

        return $this;
    }

    public function getAccessoire(): ?Accessoire
    {
        return $this->accessoire;
    }

    public function setAccessoire(?Accessoire $accessoire): self
    {
        $this->accessoire = $accessoire;

        return $this;
    }
}
