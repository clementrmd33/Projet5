<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CommentsRepository")
 */
class Comments
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     * @Assert\Length(
     *      min = 4,
     *      max = 20,
     *      minMessage = "Ton message doit comporter minimum {{ limit }} caracteres",
     *      maxMessage = "Ton message doit comporter maximum {{ limit }} caracteres"
     * )
     */
    private $nom;

    /**
     * @ORM\Column(type="text")
     * @Assert\Length(
     *     min = 10,
     *     max = 200,
     *     minMessage = "Ton message doit comporter minimum {{ limit }} caracteres",
     *     maxMessage = "Ton message doit comporter maximum {{ limit }} caracteres"
     * )
     */
    private $message;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createAt;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\CocktailsAlcool", inversedBy="comments")
     * @ORM\JoinColumn(nullable=false)
     */
    private $cocktails;

    public function getId()
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

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }

    public function getCreateAt(): ?\DateTimeInterface
    {
        return $this->createAt;
    }

    public function setCreateAt(\DateTimeInterface $createAt): self
    {
        $this->createAt = $createAt;

        return $this;
    }

    public function getCocktails(): ?CocktailsAlcool
    {
        return $this->cocktails;
    }

    public function setCocktails(?CocktailsAlcool $cocktails): self
    {
        $this->cocktails = $cocktails;

        return $this;
    }
}
