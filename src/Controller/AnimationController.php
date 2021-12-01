<?php

namespace App\Controller;

use app\Entity\Animation;
use App\Services\AnimationService;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
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
        $listeAnimation = $animationService->getListAnimation();
        return $this->render('animation/list.html.twig',['animationList'=>$listeAnimation]);
    }

     /**
     * @Route("animation/create","animation_creation")
     */
    public function newAnimation(Request $request,AnimationService $animationService):Response
    {

        $animation = new Animation('','','','','','','');
        $form = $this->createFormBuilder($animation)
        ->add('Image',TextType::class)
        ->add('Image',TextType::class)
        ->add('Image',TextType::class)
        ->add('Image',TextType::class)
        ->add('Titre',TextType::class)
        ->add('Date',TextType::class)
        ->add('Description',TextType::class)
        ->add('save', SubmitType::class, ['label' => 'Enregistrer'])
            ->getForm();
        $request = Request::createFromGlobals();
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $animation = $form->getData();
            $animationService->addAnimation($animation);
            return $this->render('animation/create_completed.html.twig',['animation'=>$animation]);
        }
        else
            return $this->render('animation/creer.html.twig',['formulaire'=>$form->createView()]);
    }

    /**
    * @Route("animation/{pId}","animation_show")
    */
    public function show($pId, AnimationService $animationService):Response
    {
        $animation = $animationService->getAnimation($pId);
        return $this->render('aniamtion/animation.html.twig',['animation'=>$animation['animation']]);
    }

    /**
     * @Route("animation/delete/{pId}","animation_delete")
     */
    public function delete($pId, AnimationService $animationService):Response
    {
        $animationService->delAnimation($pId);
        return $this->render('animation/delete_completed.html.twig');
    }
}
