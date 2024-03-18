<?php

namespace App\Controller\Admin;

use App\Entity\Category;
use App\Entity\Faq;
use App\Entity\Level;
use App\Entity\Sublevel;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{   
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        return $this->render('admin/index.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('MathVenture');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Tableau de bord', 'fa fa-home');
        yield MenuItem::linkToCrud('Catégories', 'fas fa-list', Category::class);
        yield MenuItem::linkToCrud('FAQ', 'fas fa-circle-question', Faq::class);
        yield MenuItem::linkToCrud('Niveaux', 'fas fa-school', Level::class);
        yield MenuItem::linkToCrud('Classes', 'fas fa-graduation-cap', Sublevel::class);
    }
}
