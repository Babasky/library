<?php

namespace App\Services;

use App\Repository\ChoiceReasonRepository;

class ReasonService
{
    public function __construct(private ChoiceReasonRepository $reasonRepository)
    {
    }

    public function getAllReasons()
    {
        return $this->reasonRepository->findAll();
    }
}
