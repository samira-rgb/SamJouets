<?php

namespace App\Entity;

use App\Repository\CommandeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CommandeRepository::class)
 */
class Commande
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $date_commande;

    /**
     * @ORM\Column(type="integer")
     */
    private $montant_total;

    /**
     * @ORM\ManyToOne(targetEntity=Users::class, inversedBy="commandes")
     */
    private $user;

    /**
     * @ORM\OneToOne(targetEntity=Panier::class, cascade={"persist", "remove"})
     */
    private $panier;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateCommande(): ?\DateTimeInterface
    {
        return $this->date_commande;
    }

    public function setDateCommande(\DateTimeInterface $date_commande): self
    {
        $this->date_commande = $date_commande;

        return $this;
    }

    public function getMontantTotal(): ?int
    {
        return $this->montant_total;
    }

    public function setMontantTotal(int $montant_total): self
    {
        $this->montant_total = $montant_total;

        return $this;
    }

    public function getUser(): ?Users
    {
        return $this->user;
    }

    public function setUser(?Users $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getPanier(): ?Panier
    {
        return $this->panier;
    }

    public function setPanier(?Panier $panier): self
    {
        $this->panier = $panier;

        return $this;
    }
}
