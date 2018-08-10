<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SpiritueuxRepository")
 */
class Spiritueux
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
     * @ORM\Column(type="text")
     */
    private $histoire;

    /**
     * @ORM\Column(type="text")
     */
    private $elaboration;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lieuproduction;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $marques;

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

    public function getLieuproduction(): ?string
    {
        return $this->lieuproduction;
    }

    public function setLieuproduction(string $lieuproduction): self
    {
        $this->lieuproduction = $lieuproduction;

        return $this;
    }

    public function getMarques(): ?string
    {
        return $this->marques;
    }

    public function setMarques(string $marques): self
    {
        $this->marques = $marques;

        return $this;
    }
}
