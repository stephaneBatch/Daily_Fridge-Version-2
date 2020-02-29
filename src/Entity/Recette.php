<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RecetteRepository")
 */
class Recette
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
     * @ORM\OneToMany(targetEntity="App\Entity\CompoRecette", mappedBy="recette")
     */
    private $compoRecettes;

    public function __construct()
    {
        $this->compoRecettes = new ArrayCollection();
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
            $compoRecette->setRecette($this);
        }

        return $this;
    }

    public function removeCompoRecette(CompoRecette $compoRecette): self
    {
        if ($this->compoRecettes->contains($compoRecette)) {
            $this->compoRecettes->removeElement($compoRecette);
            // set the owning side to null (unless already changed)
            if ($compoRecette->getRecette() === $this) {
                $compoRecette->setRecette(null);
            }
        }

        return $this;
    }

    
}
