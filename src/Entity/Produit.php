<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProduitRepository")
 */
class Produit
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
     * @ORM\Column(type="float")
     */
    private $Prix;

    /**
     * @ORM\Column(type="datetime")
     */
    private $Date_Limite;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $Taux_Sucre;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $Taux_Sel;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $Taux_Proteine;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $Taux_Fibre;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $Taux_Energie;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $Taux_Gras;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $Nutriscore;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $Taux_Additif;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\CompoRecette", mappedBy="produit")
     */
    private $compoRecettes;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\HistoriqueAchat", mappedBy="produit")
     */
    private $historiqueAchats;

    public function __construct()
    {
        $this->historiqueAchats = new ArrayCollection();
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

    public function getPrix(): ?float
    {
        return $this->Prix;
    }

    public function setPrix(float $Prix): self
    {
        $this->Prix = $Prix;

        return $this;
    }

    public function getDateLimite(): ?\DateTimeInterface
    {
        return $this->Date_Limite;
    }

    public function setDateLimite(\DateTimeInterface $Date_Limite): self
    {
        $this->Date_Limite = $Date_Limite;

        return $this;
    }

    public function getTauxSucre(): ?float
    {
        return $this->Taux_Sucre;
    }

    public function setTauxSucre(?float $Taux_Sucre): self
    {
        $this->Taux_Sucre = $Taux_Sucre;

        return $this;
    }

    public function getTauxSel(): ?float
    {
        return $this->Taux_Sel;
    }

    public function setTauxSel(?float $Taux_Sel): self
    {
        $this->Taux_Sel = $Taux_Sel;

        return $this;
    }

    public function getTauxProteine(): ?int
    {
        return $this->Taux_Proteine;
    }

    public function setTauxProteine(?int $Taux_Proteine): self
    {
        $this->Taux_Proteine = $Taux_Proteine;

        return $this;
    }

    public function getTauxFibre(): ?float
    {
        return $this->Taux_Fibre;
    }

    public function setTauxFibre(?float $Taux_Fibre): self
    {
        $this->Taux_Fibre = $Taux_Fibre;

        return $this;
    }

    public function getTauxEnergie(): ?int
    {
        return $this->Taux_Energie;
    }

    public function setTauxEnergie(?int $Taux_Energie): self
    {
        $this->Taux_Energie = $Taux_Energie;

        return $this;
    }

    public function getTauxGras(): ?float
    {
        return $this->Taux_Gras;
    }

    public function setTauxGras(?float $Taux_Gras): self
    {
        $this->Taux_Gras = $Taux_Gras;

        return $this;
    }

    public function getNutriscore(): ?int
    {
        return $this->Nutriscore;
    }

    public function setNutriscore(?int $Nutriscore): self
    {
        $this->Nutriscore = $Nutriscore;

        return $this;
    }

    public function getTauxAdditif(): ?int
    {
        return $this->Taux_Additif;
    }

    public function setTauxAdditif(?int $Taux_Additif): self
    {
        $this->Taux_Additif = $Taux_Additif;

        return $this;
    }

    /**
     * @return Collection|CompoRecette[]
     */
    public function getCompoRecettes(): Collection
    {
        return $this->compoRecettes;
    }

    public function addCompoRecette(CompoRecette $compoRecette): self
    {
        if (!$this->compoRecettes->contains($compoRecette)) {
            $this->compoRecettes[] = $compoRecette;
            $compoRecette->setProduit($this);
        }

        return $this;
    }

    public function removeCompoRecette(CompoRecette $compoRecette): self
    {
        if ($this->compoRecettes->contains($compoRecette)) {
            $this->compoRecettes->removeElement($compoRecette);
            // set the owning side to null (unless already changed)
            if ($compoRecette->getProduit() === $this) {
                $compoRecette->setProduit(null);
            }
        }

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
            $historiqueAchat->setProduit($this);
        }

        return $this;
    }

    public function removeHistoriqueAchat(HistoriqueAchat $historiqueAchat): self
    {
        if ($this->historiqueAchats->contains($historiqueAchat)) {
            $this->historiqueAchats->removeElement($historiqueAchat);
            // set the owning side to null (unless already changed)
            if ($historiqueAchat->getProduit() === $this) {
                $historiqueAchat->setProduit(null);
            }
        }

        return $this;
    }

}
