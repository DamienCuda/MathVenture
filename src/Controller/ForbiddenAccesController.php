<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ForbiddenAccesController extends AbstractController
{

    #[Route('/access-denied', name: 'access-denied')]
    public function accessDenied(): Response
    {
        $this->addFlash('error', 'Vous n\'avez pas les droits d\'accès à cet espace 😉');
        return $this->redirectToRoute('app_home');
    }
}
