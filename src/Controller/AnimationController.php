<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AnimationController extends AbstractController
{
    /**
     * @Route("/animation", name="animation")
     */
    public function index(): Response
    {
        return $this->render('animation/index.html.twig', ['controller_name' => 'AnimationController',]);
    }

    /**
     * @Route("/animation/list", name="liste_animation")
     */
    public function list(AnimationController $animationService): Response{
        $listeAnimation = $animationService->getList();
        return $this->render('animation/list.html.twig',['animationList'=>$listeAnimation]);
    }
}
