<?php

namespace App\Entity;

use App\Repository\PRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PRepository::class)]
class P
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    public function getId(): ?int
    {
        return $this->id;
    }
}
