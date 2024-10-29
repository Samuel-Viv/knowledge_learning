<?php

namespace App\Entity;

use App\Repository\ThemeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ThemeRepository::class)]
class Theme
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id_theme = null;

    #[ORM\Column(length: 255)]
    private ?string $name_theme = null;

    public function getId(): ?int
    {
        return $this->id_theme;
    }

    public function getNameTheme(): ?string
    {
        return $this->name_theme;
    }

    public function setNameTheme(string $name_theme): static
    {
        $this->name_theme = $name_theme;

        return $this;
    }
}
