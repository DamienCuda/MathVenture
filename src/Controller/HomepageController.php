<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomepageController extends AbstractController
{
    #[Route('/', name: 'app_homepage_index')]
    public function index(): Response
    {
        return $this->render('homepage/index.html.twig', [
        ]);
    }
    #[Route('/test', name: 'app_homepage_test')]
    public function test(): Response
    {
        return $this->render('homepage/index_test.html.twig', [
        ]);
    }
}
