<?php

namespace App\Services;

use App\Repository\BookRepository;

class BookService
{
    public function __construct(private BookRepository $bookRepository)
    {
    }

    public function getBooks(): array
    {
        return $this->bookRepository->findAll();
    }

    public function getLastFourBooks(): array
    {
        return $this->bookRepository->findBy([], ['published_date' => 'DESC'], 4);
    }
}
