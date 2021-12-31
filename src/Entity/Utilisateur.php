<?php

namespace App\Entity;

use App\Repository\UtilisateurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UtilisateurRepository::class)
 */
class Utilisateur
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
    private $Nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Prenom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Tel;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Mail;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $User;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Password;

    /**
     * @ORM\ManyToOne(targetEntity=TypeUtilisateur::class, inversedBy="Type")
     * @ORM\JoinColumn(nullable=false)
     */
    private $typeUtilisateur;

    /**
     * @ORM\Column(type="date")
     */
    private $Date_creation;

    /**
     * @ORM\OneToMany(targetEntity=HistoActivite::class, mappedBy="utilisateur")
     */
    private $Histo;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->Prenom;
    }

    public function setPrenom(string $Prenom): self
    {
        $this->Prenom = $Prenom;

        return $this;
    }

    public function getTel(): ?string
    {
        return $this->Tel;
    }

    public function setTel(?string $Tel): self
    {
        $this->Tel = $Tel;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->Mail;
    }

    public function setMail(string $Mail): self
    {
        $this->Mail = $Mail;

        return $this;
    }

    public function getUser(): ?string
    {
        return $this->User;
    }

    public function setUser(string $User): self
    {
        $this->User = $User;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->Password;
    }

    public function setPassword(string $Password): self
    {
        $this->Password = $Password;

        return $this;
    }

    public function getTypeUtilisateur(): ?TypeUtilisateur
    {
        return $this->typeUtilisateur;
    }

    public function setTypeUtilisateur(?TypeUtilisateur $typeUtilisateur): self
    {
        $this->typeUtilisateur = $typeUtilisateur;

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
            $histo->setUtilisateur($this);
        }

        return $this;
    }

    public function removeHisto(HistoActivite $histo): self
    {
        if ($this->Histo->removeElement($histo)) {
            // set the owning side to null (unless already changed)
            if ($histo->getUtilisateur() === $this) {
                $histo->setUtilisateur(null);
            }
        }

        return $this;
    }

    
    public function __construct($pType_Utilisateur, $pNom, $pPrenom, $pTel, $pMail, $pUser, $pPassword, $pDate_Creation)
    {
        $this->typeUtilisateur = $pType_Utilisateur;
        $this->Nom = $pNom;
        $this->Prenom = $pPrenom;
        $this->Tel = $pTel;
        $this->Mail = $pMail;
        $this->User = $pUser;
        $this->Password = $pPassword;
        $this->Date_creation = $pDate_Creation;        
        $this->Histo = new ArrayCollection();
    }
}
