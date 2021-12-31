<?php

namespace App\Entity;

use App\Repository\LoterieResultatRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LoterieResultatRepository::class)
 */
class LoterieResultat
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
    private $Date_loterie;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $User_winner;

    /**
     * @ORM\Column(type="date")
     */
    private $Date_creation;

    /**
     * @ORM\OneToOne(targetEntity=Activite::class, mappedBy="Loterie", cascade={"persist", "remove"})
     */
    private $activite;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateLoterie(): ?\DateTimeInterface
    {
        return $this->Date_loterie;
    }

    public function setDateLoterie(\DateTimeInterface $Date_loterie): self
    {
        $this->Date_loterie = $Date_loterie;

        return $this;
    }

    public function getUserWinner(): ?string
    {
        return $this->User_winner;
    }

    public function setUserWinner(string $User_winner): self
    {
        $this->User_winner = $User_winner;

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

    public function getActivite(): ?Activite
    {
        return $this->activite;
    }

    public function setActivite(?Activite $activite): self
    {
        // unset the owning side of the relation if necessary
        if ($activite === null && $this->activite !== null) {
            $this->activite->setLoterie(null);
        }

        // set the owning side of the relation if necessary
        if ($activite !== null && $activite->getLoterie() !== $this) {
            $activite->setLoterie($this);
        }

        $this->activite = $activite;

        return $this;
    }

    public function __construct($pDate_Loterie, $pUser_Winner, $pDate_Creation, $pActivite)
    {
        $this->Date_loterie = $pDate_Loterie;
        $this->User_winner = $pUser_Winner;
        $this->Date_creation = $pDate_Creation;
        $this->activite = $pActivite;
    }
}
