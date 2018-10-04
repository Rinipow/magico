<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class RegistrationController
 * @package App\Controller
 * @Route("/utenti", name="user_")
 */
class UserController extends AbstractController
{
    /**
     * @Route("/new", name="new")
     *
     * @param Request                $request
     * @param EntityManagerInterface $em
     *
     * @return Response
     */
    public function new(Request $request, EntityManagerInterface $em)
    {
        $user = new User();
        return $this->edit($user, $request, $em);
    }

    /**
     * @Route("/edit/{id}", name="edit")
     *
     * @param User                   $user
     * @param Request                $request
     * @param EntityManagerInterface $em
     *
     * @return Response
     */
    public function edit(User $user, Request $request, EntityManagerInterface $em)
    {

        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($user);
            $em->flush();
            $this->addFlash('success', 'Utente modificato con successo');
        }

        return $this->render('user/edit.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}