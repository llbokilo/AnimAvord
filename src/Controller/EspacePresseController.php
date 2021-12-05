<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EspacePresseController extends AbstractController
{
    /**
     * @Route("/espace_presse", name="espace_presse")
     */
    public function index(): Response
    {
        return $this->render('espace_presse/index.html.twig', [
            'controller_name' => 'EspacePresseController',
        ]);
    }
}
