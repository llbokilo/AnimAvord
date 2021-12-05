<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PolCookiesController extends AbstractController
{
    /**
     * @Route("/pol_cookies", name="pol_cookies")
     */
    public function index(): Response
    {
        return $this->render('pol_cookies/index.html.twig', [
            'controller_name' => 'PolCookiesController',
        ]);
    }
}
