<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GestCookiesController extends AbstractController
{
    /**
     * @Route("/gest_cookies", name="gest_cookies")
     */
    public function index(): Response
    {
        return $this->render('gest_cookies/index.html.twig', [
            'controller_name' => 'GestCookiesController',
        ]);
    }
}
