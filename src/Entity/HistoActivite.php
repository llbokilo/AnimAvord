<?php

namespace App\Entity;

use App\Repository\HistoActiviteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=HistoActiviteRepository::class)
 */
class HistoActivite
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $Date_ajout;

    /**
     * @ORM\ManyToOne(targetEntity=Activite::class, inversedBy="Histo")
     * @ORM\JoinColumn(nullable=false)
     */
    private $activite;

    /**
     * @ORM\ManyToOne(targetEntity=Utilisateur::class, inversedBy="Histo")
     * @ORM\JoinColumn(nullable=false)
     */
    private $utilisateur;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateAjout(): ?\DateTimeInterface
    {
        return $this->Date_ajout;
    }

    public function setDateAjout(\DateTimeInterface $Date_ajout): self
    {
        $this->Date_ajout = $Date_ajout;

        return $this;
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

    public function getUtilisateur(): ?Utilisateur
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(?Utilisateur $utilisateur): self
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    public function __construct($pDate_Ajout, $pActivite, $pUtilisateur)
    {
        $this->Date_ajout = $pDate_Ajout;
        $this->activite = $pActivite;
        $this->utilisateur = $pUtilisateur;
    }
}
