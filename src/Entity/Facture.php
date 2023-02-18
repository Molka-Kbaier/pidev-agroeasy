<?php

namespace App\Entity;

use App\Repository\FactureRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FactureRepository::class)]
class Facture
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_facture = null;

    #[ORM\Column(length: 255)]
    private ?string $type = null;

    #[ORM\Column]
    private ?float $montant_totale = null;

    #[ORM\ManyToOne(inversedBy: 'factures')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Comptabilite $comptabilite = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Utilisateur $utilisateur = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Utilisateur $client_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateFacture(): ?\DateTimeInterface
    {
        return $this->date_facture;
    }

    public function setDateFacture(\DateTimeInterface $date_facture): self
    {
        $this->date_facture = $date_facture;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getMontantTotale(): ?float
    {
        return $this->montant_totale;
    }

    public function setMontantTotale(float $montant_totale): self
    {
        $this->montant_totale = $montant_totale;

        return $this;
    }

    public function getComptabilite(): ?Comptabilite
    {
        return $this->comptabilite;
    }

    public function setComptabilite(?Comptabilite $comptabilite): self
    {
        $this->comptabilite = $comptabilite;

        return $this;
    }

    public function getUtilisateur(): ?Utilisateur
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(Utilisateur $utilisateur): self
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    public function getClientId(): ?Utilisateur
    {
        return $this->client_id;
    }

    public function setClientId(Utilisateur $client_id): self
    {
        $this->client_id = $client_id;

        return $this;
    }
}
