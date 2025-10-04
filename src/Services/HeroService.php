<?php
namespace App\Services;

use App\Repository\HeroRepository;

class HeroService
{
    public function __construct(private HeroRepository $heroRepository)
    {
    }

    public function getHeroes(): array
    {
        return $this->heroRepository->findAll();
    }
}