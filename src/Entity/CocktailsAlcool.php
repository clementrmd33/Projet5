<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
    private $Nom;

    /**
     * @ORM\Column(type="text", length=255)
     */
    private $Recette;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $Decoration;

    /**
     * @ORM\Column(type="text")
     */
    private $Histoire;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Alcool;

    /**
     * @ORM\Column(type="text")
     */
    private $Elaboration;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Comments", mappedBy="cocktails", orphanRemoval=true)
     */
    private $comments;

    public function __construct()
    {
        $this->comments = new ArrayCollection();
    }

    public function getId()
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
    public function getRecette(): ?string
    {
        return $this->Recette;
    }

    public function setRecette(string $Recette): self
    {
        $this->Recette = $Recette;

        return $this;
    }

    public function getDecoration(): ?string
    {
        return $this->Decoration;
    }

    public function setDecoration(string $Decoration): self
    {
        $this->Decoration = $Decoration;

        return $this;
    }

    public function getHistoire(): ?string
    {
        return $this->Histoire;
    }

    public function setHistoire(string $Histoire): self
    {
        $this->Histoire = $Histoire;

        return $this;
    }

    public function getAlcool(): ?string
    {
        return $this->Alcool;
    }

    public function setAlcool(string $Alcool): self
    {
        $this->Alcool = $Alcool;

        return $this;
    }
    public function getElaboration(): ?string
    {
        return $this->Elaboration;
    }

    public function setElaboration(string $Elaboration): self
    {
        $this->Elaboration = $Elaboration;

        return $this;
    }
    public function __toString()
    {
        // to show the name of the Category in the select
        return $this->Alcool;
        // to show the id of the Category in the select
        // return $this->id;
    }

    /**
     * @return Collection|Comments[]
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }

    public function addComment(Comments $comment): self
    {
        if (!$this->comments->contains($comment)) {
            $this->comments[] = $comment;
            $comment->setCocktails($this);
        }

        return $this;
    }

    public function removeComment(Comments $comment): self
    {
        if ($this->comments->contains($comment)) {
            $this->comments->removeElement($comment);
            // set the owning side to null (unless already changed)
            if ($comment->getCocktails() === $this) {
                $comment->setCocktails(null);
            }
        }

        return $this;
    }
}
