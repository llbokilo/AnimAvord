<?php

namespace App\Entity;

use App\Repository\TypeUtilisateurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TypeUtilisateurRepository::class)
 */
class TypeUtilisateur
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity=utilisateur::class, mappedBy="typeUtilisateur")
     */
    private $Type;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Nom_Type;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|utilisateur[]
     */
    public function getType(): Collection
    {
        return $this->Type;
    }

    public function addType(utilisateur $type): self
    {
        if (!$this->Type->contains($type)) {
            $this->Type[] = $type;
            $type->setTypeUtilisateur($this);
        }

        return $this;
    }

    public function removeType(utilisateur $type): self
    {
        if ($this->Type->removeElement($type)) {
            // set the owning side to null (unless already changed)
            if ($type->getTypeUtilisateur() === $this) {
                $type->setTypeUtilisateur(null);
            }
        }

        return $this;
    }

    public function getNomType(): ?string
    {
        return $this->Nom_Type;
    }

    public function setNomType(string $Nom_Type): self
    {
        $this->Nom_Type = $Nom_Type;

        return $this;
    }

    public function __construct($pNomType)
    {
        $this->Nom_Type = $pNomType;
        $this->Type = new ArrayCollection();
    }
}
