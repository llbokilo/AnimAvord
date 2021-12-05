<?php

namespace App\Controller;

use app\Entity\Spectacle;
use App\Services\SpectacleService;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class SpectacleController extends AbstractController
{
    /**
     * @Route("/spectacle", name="spectacle")
     */
    public function index(): Response
    {
        return $this->render('spectacle/index.html.twig', ['controller_name' => 'SpectacleController',]);
    }

    /**
     * @Route("/spectacle/list", name="liste_spectacle")
     */
    public function list(SpectacleService $spectacleService): Response{
        $listeSpectacle = $spectacleService->getListSpectacle();
        return $this->render('spectacle/list.html.twig',['spectacleList'=>$listeSpectacle]);
    }

     /**
     * @Route("spectacle/create","spectacle_creation")
     */
    public function newSpectacle(Request $request,SpectacleService $spectacleService):Response
    {

        $spectacle = new Spectacle('','','','','','','');
        $form = $this->createFormBuilder($spectacle)
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
            $spectacle = $form->getData();
            $spectacleService->addSpectacle($spectacle);
            return $this->render('spectacle/create_completed.html.twig',['spectacle'=>$spectacle]);
        }
        else
            return $this->render('spectacle/creer.html.twig',['formulaire'=>$form->createView()]);
    }

    /**
    * @Route("spectacle/{pId}","spectacle_show")
    */
    public function show($pId, SpectacleService $spectacleService):Response
    {
        $spectacle = $spectacleService->getSpectacle($pId);
        return $this->render('spectacle/spectacle.html.twig',['spectacle'=>$spectacle['spectacle']]);
    }

    /**
     * @Route("spectacle/delete/{pId}","spectacle_delete")
     */
    public function delete($pId, SpectacleService $spectacleService):Response
    {
        $spectacleService->delSpectacle($pId);
        return $this->render('spectacle/delete_completed.html.twig');
    }
}
