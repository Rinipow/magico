<?php

namespace App\Controller;

use App\Entity\Magico;
use App\Form\MagicoType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class MagicoController extends AbstractController
{
    /**
     * @Route("/magico", name="magico_index")
     * @param Request                      $request
     * @param EntityManagerInterface       $em
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function index(Request $request, EntityManagerInterface $em)
    {
        // 1) build the form
        $magico = new Magico();
        $repository = $this->getDoctrine()->getRepository(Magico::class);
        $magicos = $repository->findAll();
        $form = $this->createForm(MagicoType::class, $magico);

        // 2) handle the submit (will only happen on POST)
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            // 4) save the User!
            $em->persist($magico);
            $em->flush();

            return $this->redirectToRoute('magico_index');
        }

        return $this->render(
            'magico/index.html.twig',
            ['form' => $form->createView(), 'magicos' => $magicos]
        );
    }

    /**
     * @Route("/magico/edit/{id}", name="magico_edit")
     * @param Request                      $request
     * @param EntityManagerInterface       $em
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function edit(Request $request, EntityManagerInterface $em, Magico $magico){

        $form = $this->createForm(MagicoType::class, $magico);

        // 2) handle the submit (will only happen on POST)
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            // 4) save the User!
            $em->persist($magico);
            $em->flush();

            return $this->redirectToRoute('magico_index');
        }

        return $this->render(
            'magico/edit.html.twig',
            ['form' => $form->createView()]
        );
    }
}
