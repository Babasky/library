<?php

namespace App\Controller;

use App\Services\BookService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class BookController extends AbstractController
{
    #[Route('/book', name: 'app_book')]
    public function index(BookService $bookService): Response
    {
        $books = $bookService->getBooks();
        return $this->render('book/index.html.twig', [
            'books' => $books,
        ]);
    }
}
