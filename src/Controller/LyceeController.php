<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class LyceeController extends AbstractController
{
    #[Route('/lycee', name: 'app_lycee')]
    public function index(): Response
    {
        return $this->render('lycee/index.html.twig', [
            'controller_name' => 'LyceeController',
        ]);
    }
}
