<?php

namespace App\Entity;

use App\Repository\QSNRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: QSNRepository::class)]
class QSN extends Page
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
