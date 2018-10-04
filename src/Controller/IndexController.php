<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class IndexController
 * @package App\Controller
 */
class IndexController extends AbstractController
{
    /**
     * @Route("/", name = "index")
     * @param string $title
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(string $title = 'world')
    {
        return $this->render('index/index.html.twig', [
            'title' => 'Benvenuto',
            'message' => 'Hello ' . $title,
        ]);

    }
}
