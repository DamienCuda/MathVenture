<?php

namespace App\Controller;

use App\Repository\FaqRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomepageController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(FaqRepository $faq): Response
    {
        $faqs = $faq->findAll();
        return $this->render('homepage/index.html.twig', [
            'faqs' => $faqs,
        ]);
    }
}
