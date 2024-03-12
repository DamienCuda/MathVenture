<?php

namespace App\Controller;

use App\Entity\Utilisateur;
use App\Form\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;


class UserController extends AbstractController
{
    #[Route('/user', name: 'app_user')]
    public function index(): Response
    {
        $user = $this->getUser();
        $userId = $user->getId();

        return $this->render('user/index.html.twig', [
            'user_id' => $userId
        ]);
    }

    #[Route('/user/edit/{id}', name: 'app_user_edit')]
    public function edit(Utilisateur $user, Request $request, EntityManagerInterface $manager): Response
    {
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $manager->flush();
            return $this->redirectToRoute('app_user');
        }
        return $this->render('user/edit.html.twig', [
            'user'=> $user,
            'form' => $form
        ]);
    }
}
