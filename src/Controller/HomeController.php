<?php

namespace App\Controller;

use App\Services\BookService;
use App\Services\HeroService;
use App\Services\ReasonService;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

final class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(HeroService $heroService, BookService $bookService, ReasonService $reasonService): Response
    {
        $hero = $heroService->getHeroes()[0];
        $books = $bookService->getLastFourBooks();
        $reasons = $reasonService->getAllReasons();
        //dd($reasons);
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'hero' => $hero,
            'books' => $books,
            'reasons' => $reasons,
        ]);
    }
}
