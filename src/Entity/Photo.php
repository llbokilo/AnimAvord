<?php

namespace App\Entity;

use App\Repository\PhotoRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PhotoRepository::class)
 */
class Photo
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Activite::class, inversedBy="Photo")
     * @ORM\JoinColumn(nullable=false)
     */
    private $activite;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Lien_Photo;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getActivite(): ?Activite
    {
        return $this->activite;
    }

    public function setActivite(?Activite $activite): self
    {
        $this->activite = $activite;

        return $this;
    }

    public function getLienPhoto(): ?string
    {
        return $this->Lien_Photo;
    }

    public function setLienPhoto(string $Lien_Photo): self
    {
        $this->Lien_Photo = $Lien_Photo;

        return $this;
    }

    public function __construct($pActivite, $pLienPhoto)
    {
        $this->activite = $pActivite;
        $this->Lien_Photo = $pLienPhoto;
    }
}
