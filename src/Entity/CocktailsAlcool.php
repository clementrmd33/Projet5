<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CocktailsAlcoolRepository")
 */
class CocktailsAlcool
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
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $recette;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $decoration;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $histoire;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $elaboration;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $alcool;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getRecette(): ?string
    {
        return $this->recette;
    }

    public function setRecette(string $recette): self
    {
        $this->recette = $recette;

        return $this;
    }

    public function getDecoration(): ?string
    {
        return $this->decoration;
    }

    public function setDecoration(string $decoration): self
    {
        $this->decoration = $decoration;

        return $this;
    }

    public function getHistoire(): ?string
    {
        return $this->histoire;
    }

    public function setHistoire(string $histoire): self
    {
        $this->histoire = $histoire;

        return $this;
    }

    public function getElaboration(): ?string
    {
        return $this->elaboration;
    }

    public function setElaboration(string $elaboration): self
    {
        $this->elaboration = $elaboration;

        return $this;
    }

    public function getAlcool(): ?string
    {
        return $this->alcool;
    }

    public function setAlcool(string $alcool): self
    {
        $this->alcool = $alcool;

        return $this;
    }
}
