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
    private $Nom;

    /**
     * @ORM\Column(type="text")
     */
    private $Histoire;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Elaboration;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Lieuproduction;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Marques;

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

    public function getHistoire(): ?string
    {
        return $this->Histoire;
    }

    public function setHistoire(string $Histoire): self
    {
        $this->Histoire = $Histoire;

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

    public function getLieuProduction(): ?string
    {
        return $this->Lieuproduction;
    }

    public function setLieuProduction(string $Lieuproduction): self
    {
        $this->Lieuproduction = $Lieuproduction;

        return $this;
    }

    public function getMarques(): ?string
    {
        return $this->Marques;
    }

    public function setMarques(string $Marques): self
    {
        $this->Marques = $Marques;

        return $this;
    }
}
