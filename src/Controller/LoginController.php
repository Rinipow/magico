<?php

namespace App\Controller;


use App\Form\LoginType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

/**
 * Class LoginController
 * @package App\Controller
 * @Route("/login", name="login_")
 */
class LoginController extends AbstractController
{
    /**
     * @Route("", name="index")
     * @param Request             $request
     *
     * @param AuthenticationUtils $authenticationUtils
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function login(Request $request, AuthenticationUtils $authenticationUtils)
    {
        $form = $this->createUnnamedForm(LoginType::class);

        $form->handleRequest($request);

        $errors = $authenticationUtils->getLastAuthenticationError();

        return $this->render('login/login.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @param string $type
     * @param null   $data
     * @param array  $options
     *
     * @return FormInterface
     */
    protected function createUnnamedForm(string $type, $data = NULL, array $options = []): FormInterface
    {
        return $this->container->get('form.factory')->createNamedBuilder('', $type, $data, $options)->getForm();
    }
}