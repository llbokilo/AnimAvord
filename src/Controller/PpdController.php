<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PpdController extends AbstractController
{
    /**
     * @Route("/ppd", name="ppd")
     */
    public function index(): Response
    {
        return $this->render('ppd/index.html.twig', [
            'controller_name' => 'PpdController',
        ]);
    }
}
