<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SpectacleController extends AbstractController
{
    /**
     * @Route("/spectacle", name="spectacle")
     */
    public function index(): Response
    {
        return $this->render('spectacle/index.html.twig', [
            'controller_name' => 'SpectacleController',
        ]);
    }
}
