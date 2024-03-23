<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class QuizzController extends AbstractController
{
    #[Route('/quizz', name: 'app_quizz')]
    public function index(): Response
    {
        return $this->render('quizz/index.html.twig', [
        ]);
    }
    #[Route('/quizz/{cours_slug}', name: 'app_quizz_cours')]
    public function quizz(string $cours_slug): Response
    {
        return $this->render('quizz/quizz.html.twig', [
        ]);
    }
}
