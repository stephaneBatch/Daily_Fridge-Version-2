<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CompoRecetteRepository")
 */
class CompoRecette
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    private $nom;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Recette", inversedBy="compoRecettes")
     */
    private $recette;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Produit", inversedBy="compoRecettes")
     */
    private $produit;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRecette(): ?Recette
    {
        return $this->recette;
    }

    public function setRecette(?Recette $recette): self
    {
        $this->recette = $recette;

        return $this;
    }

    public function getProduit(): ?Produit
    {
        return $this->produit;
    }

    public function setProduit(?Produit $produit): self
    {
        $this->produit = $produit;

        return $this;
    }
}
