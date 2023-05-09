<?php

namespace App\Entity;

use App\Repository\ProjetRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProjetRepository::class)]
class Projet
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $titre = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $type = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $echeance = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $enseignant = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $domaine = null;

    #[ORM\OneToMany(mappedBy: 'projet', targetEntity: Phase::class)]
    private Collection $Phase;

    public function __construct()
    {
        $this->Phase = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(?string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getEcheance(): ?string
    {
        return $this->echeance;
    }

    public function setEcheance(?string $echeance): self
    {
        $this->echeance = $echeance;

        return $this;
    }

    public function getEnseignant(): ?string
    {
        return $this->enseignant;
    }

    public function setEnseignant(?string $enseignant): self
    {
        $this->enseignant = $enseignant;

        return $this;
    }

    public function getDomaine(): ?string
    {
        return $this->domaine;
    }

    public function setDomaine(?string $domaine): self
    {
        $this->domaine = $domaine;

        return $this;
    }

    /**
     * @return Collection<int, Phase>
     */
    public function getPhase(): Collection
    {
        return $this->Phase;
    }

    public function addPhase(Phase $phase): self
    {
        if (!$this->Phase->contains($phase)) {
            $this->Phase->add($phase);
            $phase->setProjet($this);
        }

        return $this;
    }

    public function removePhase(Phase $phase): self
    {
        if ($this->Phase->removeElement($phase)) {
            // set the owning side to null (unless already changed)
            if ($phase->getProjet() === $this) {
                $phase->setProjet(null);
            }
        }

        return $this;
    }
    public function __toString():string
    {
        return $this->titre;

    }


}
