<?php

namespace App\Entity;

use App\Repository\SpectacleRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SpectacleRepository::class)
 */
class Spectacle
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Pic;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Pic2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Pic3;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Pic4;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Titre;

    /**
     * @ORM\Column(type="date")
     */
    private $Date;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Description;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPic(): ?string
    {
        return $this->Pic;
    }

    public function setPic(?string $Pic): self
    {
        $this->Pic = $Pic;

        return $this;
    }

    public function getPic2(): ?string
    {
        return $this->Pic2;
    }

    public function setPic2(?string $Pic2): self
    {
        $this->Pic2 = $Pic2;

        return $this;
    }

    public function getPic3(): ?string
    {
        return $this->Pic3;
    }

    public function setPic3(?string $Pic3): self
    {
        $this->Pic3 = $Pic3;

        return $this;
    }

    public function getPic4(): ?string
    {
        return $this->Pic4;
    }

    public function setPic4(?string $Pic4): self
    {
        $this->Pic4 = $Pic4;

        return $this;
    }

    public function getTitre(): ?string
    {
        return $this->Titre;
    }

    public function setTitre(string $Titre): self
    {
        $this->Titre = $Titre;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->Date;
    }

    public function setDate(\DateTimeInterface $Date): self
    {
        $this->Date = $Date;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(?string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }
}
