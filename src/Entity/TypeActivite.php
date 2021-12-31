<?php

namespace App\Entity;

use App\Repository\TypeActiviteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TypeActiviteRepository::class)
 */
class TypeActivite
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity=activite::class, mappedBy="typeActivite")
     */
    private $Type;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Nom_type;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|activite[]
     */
    public function getType(): Collection
    {
        return $this->Type;
    }

    public function addType(activite $type): self
    {
        if (!$this->Type->contains($type)) {
            $this->Type[] = $type;
            $type->setTypeActivite($this);
        }

        return $this;
    }

    public function removeType(activite $type): self
    {
        if ($this->Type->removeElement($type)) {
            // set the owning side to null (unless already changed)
            if ($type->getTypeActivite() === $this) {
                $type->setTypeActivite(null);
            }
        }

        return $this;
    }

    public function getNomType(): ?string
    {
        return $this->Nom_type;
    }

    public function setNomType(string $Nom_type): self
    {
        $this->Nom_type = $Nom_type;

        return $this;
    }

    public function __construct($pNomType)
    {
        $this->Nom_type = $pNomType;
        $this->Type = new ArrayCollection();
    }

}
