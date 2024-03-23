<?php

namespace App\Controller;

use App\Repository\CourseRepository;
use App\Repository\SublevelRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CollegeController extends AbstractController
{

    #[Route('/college', name: 'app_college')]
    public function index(SublevelRepository $sublevelRepository): Response
    {
        $sublevels = $sublevelRepository ->findByParentLevelId(2, 'sublevelorder');
        return $this->render('college/index.html.twig', [
            'liste_niveau' => $sublevels,
        ]);
    }

    #[Route('/college/{slug}', name: 'app_college_niveau')]
    public function niveau(string $slug, SublevelRepository $sublevelRepository, CourseRepository $courseRepository): Response
    {
        $niveau = $sublevelRepository ->findOneBy(['slug' => $slug]);
        $courses = $courseRepository ->findBy(['sublevel' => $niveau->getId()]);
        return $this->render('college/niveau.html.twig', [
            'niveau' => $niveau,
            'liste_cours' => $courses,
        ]);
    }
    #[Route('/college/{slug}/{course_slug}', name: 'app_college_cours')]
    public function cours(string $slug, $course_slug ,CourseRepository $courseRepository): Response
    {
        $cours = $courseRepository ->findOneBy(['slug' => $course_slug]);
        return $this->render('college/cours.html.twig', [
            'cours' => $cours,
        ]);
    }
}
