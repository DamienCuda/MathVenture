<?php

namespace App\Controller;

use App\Repository\CourseRepository;
use App\Repository\LevelRepository;
use App\Repository\SublevelRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class LyceeController extends AbstractController
{

    #[Route('/lycee', name: 'app_lycee')]
    public function index(SublevelRepository $sublevelRepository): Response
    {
        $sublevels = $sublevelRepository ->findByParentLevelId(1);
        return $this->render('lycee/index.html.twig', [
            'liste_niveau' => $sublevels,
        ]);
    }

    #[Route('/lycee/{sublevel}', name: 'app_lycee_niveau')]
    public function niveau(string $sublevel, SublevelRepository $sublevelRepository, CourseRepository $courseRepository): Response
    {
        $niveau = $sublevelRepository ->findOneBy(['slug' => $sublevel]);
        $courses = $courseRepository ->findBy(['sublevel' => $niveau->getId()]);
        return $this->render('lycee/niveau.html.twig', [
            'niveau' => $niveau,
            'liste_cours' => $courses,
        ]);
    }

    #[Route('/lycee/{slug}/{course_slug}', name: 'app_lycee_cours')]
    public function cours(string $slug, string $course_slug ,CourseRepository $courseRepository): Response
    {
        $cours = $courseRepository ->findOneBy(['slug' => $course_slug]);
        return $this->render('lycee/cours.html.twig', [
            'cours' => $cours,
        ]);
    }
}
