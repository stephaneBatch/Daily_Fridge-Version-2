<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UtilisateurRepository")
 */
class Utilisateur
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
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
     * @ORM\Column(type="string", length=255)
     */
    private $Sexe;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Mdp;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TypeUtilisateur", inversedBy="utilisateurs")
     */
    private $TypeUtilisateur;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\HistoriqueAchat", mappedBy="utilisateur")
     */
    private $historiqueAchats;

    public function __construct()
    {
        $this->historiqueAchats = new ArrayCollection();
    }

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

    public function getSexe(): ?string
    {
        return $this->Sexe;
    }

    public function setSexe(string $Sexe): self
    {
        $this->Sexe = $Sexe;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(string $Email): self
    {
        $this->Email = $Email;

        return $this;
    }

    public function getMdp(): ?string
    {
        return $this->Mdp;
    }

    public function setMdp(string $Mdp): self
    {
        $this->Mdp = $Mdp;

        return $this;
    }

    public function getTypeUtilisateur(): ?TypeUtilisateur
    {
        return $this->TypeUtilisateur;
    }

    public function setTypeUtilisateur(?TypeUtilisateur $TypeUtilisateur): self
    {
        $this->TypeUtilisateur = $TypeUtilisateur;

        return $this;
    }

    /**
     * @return Collection|HistoriqueAchat[]
     */
    public function getHistoriqueAchats(): Collection
    {
        return $this->historiqueAchats;
    }

    public function addHistoriqueAchat(HistoriqueAchat $historiqueAchat): self
    {
        if (!$this->historiqueAchats->contains($historiqueAchat)) {
            $this->historiqueAchats[] = $historiqueAchat;
            $historiqueAchat->setUtilisateur($this);
        }

        return $this;
    }

    public function removeHistoriqueAchat(HistoriqueAchat $historiqueAchat): self
    {
        if ($this->historiqueAchats->contains($historiqueAchat)) {
            $this->historiqueAchats->removeElement($historiqueAchat);
            // set the owning side to null (unless already changed)
            if ($historiqueAchat->getUtilisateur() === $this) {
                $historiqueAchat->setUtilisateur(null);
            }
        }

        return $this;
    }



    
}
