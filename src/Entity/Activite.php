<?php

namespace App\Entity;

use App\Repository\ActiviteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ActiviteRepository::class)
 */
class Activite
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
    private $Titre;

    /**
     * @ORM\Column(type="date")
     */
    private $Debut;

    /**
     * @ORM\Column(type="date")
     */
    private $Fin;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Description;

    /**
     * @ORM\Column(type="date")
     */
    private $Date_creation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Utilisateur_creation;

    /**
     * @ORM\ManyToOne(targetEntity=TypeActivite::class, inversedBy="Type")
     * @ORM\JoinColumn(nullable=false)
     */
    private $typeActivite;

    /**
     * @ORM\OneToMany(targetEntity=Photo::class, mappedBy="activite")
     */
    private $Photo;

    /**
     * @ORM\OneToMany(targetEntity=HistoActivite::class, mappedBy="activite")
     */
    private $Histo;

    /**
     * @ORM\OneToOne(targetEntity=LoterieResultat::class, inversedBy="activite", cascade={"persist", "remove"})
     */
    private $Loterie;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getDebut(): ?\DateTimeInterface
    {
        return $this->Debut;
    }

    public function setDebut(\DateTimeInterface $Debut): self
    {
        $this->Debut = $Debut;

        return $this;
    }

    public function getFin(): ?\DateTimeInterface
    {
        return $this->Fin;
    }

    public function setFin(\DateTimeInterface $Fin): self
    {
        $this->Fin = $Fin;

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

    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->Date_creation;
    }

    public function setDateCreation(\DateTimeInterface $Date_creation): self
    {
        $this->Date_creation = $Date_creation;

        return $this;
    }

    public function getUtilisateurCreation(): ?string
    {
        return $this->Utilisateur_creation;
    }

    public function setUtilisateurCreation(string $Utilisateur_creation): self
    {
        $this->Utilisateur_creation = $Utilisateur_creation;

        return $this;
    }

    public function getTypeActivite(): ?TypeActivite
    {
        return $this->typeActivite;
    }

    public function setTypeActivite(?TypeActivite $typeActivite): self
    {
        $this->typeActivite = $typeActivite;

        return $this;
    }

    /**
     * @return Collection|Photo[]
     */
    public function getPhoto(): Collection
    {
        return $this->Photo;
    }

    public function addPhoto(Photo $photo): self
    {
        if (!$this->Photo->contains($photo)) {
            $this->Photo[] = $photo;
            $photo->setActivite($this);
        }

        return $this;
    }

    public function removePhoto(Photo $photo): self
    {
        if ($this->Photo->removeElement($photo)) {
            // set the owning side to null (unless already changed)
            if ($photo->getActivite() === $this) {
                $photo->setActivite(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|HistoActivite[]
     */
    public function getHisto(): Collection
    {
        return $this->Histo;
    }

    public function addHisto(HistoActivite $histo): self
    {
        if (!$this->Histo->contains($histo)) {
            $this->Histo[] = $histo;
            $histo->setActivite($this);
        }

        return $this;
    }

    public function removeHisto(HistoActivite $histo): self
    {
        if ($this->Histo->removeElement($histo)) {
            // set the owning side to null (unless already changed)
            if ($histo->getActivite() === $this) {
                $histo->setActivite(null);
            }
        }

        return $this;
    }

    public function getLoterie(): ?LoterieResultat
    {
        return $this->Loterie;
    }

    public function setLoterie(?LoterieResultat $Loterie): self
    {
        $this->Loterie = $Loterie;

        return $this;
    }
    
    public function __construct($pTypeActivite, $pTitre, $pDebut, $pFin, $pDescription, $pDate_creation, $pUtilisateur_Creation, $pLoterie)
    {
        $this->typeActivite = $pTypeActivite;
        $this->Titre = $pTitre;
        $this->Debut = $pDebut;
        $this->Fin = $pFin;
        $this->Description = $pDescription;
        $this->Date_creation = $pDate_creation;
        $this->Utilisateur_creation = $pUtilisateur_Creation;
        $this->Loterie = $pLoterie;
        $this->Photo = new ArrayCollection();
        $this->Histo = new ArrayCollection();
    }
}
