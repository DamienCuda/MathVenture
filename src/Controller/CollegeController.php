<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CollegeController extends AbstractController
{
    #[Route('/college', name: 'app_college')]
    public function index(): Response
    {
        return $this->render('college/index.html.twig', [
        ]);
    }
}
