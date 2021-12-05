<?php

namespace App\Controller;

use app\Entity\Evenement;
use App\Services\EvenementService;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class EvenementController extends AbstractController
{
    /**
     * @Route("/evenement", name="evenement")
     */
    public function index(): Response
    {
        return $this->render('evenement/index.html.twig', ['controller_name' => 'EvenementController',]);
    }

    /**
     * @Route("/evenement/list", name="liste_evenement")
     */
    public function list(EvenementService $evenementService): Response{
        $listeEvenement = $evenementService->getListEvenement();
        return $this->render('evenement/list.html.twig',['evenementList'=>$listeEvenement]);
    }

     /**
     * @Route("evenement/create","evenement_creation")
     */
    public function newEvenement(Request $request,EvenementService $evenementService):Response
    {

        $evenement = new Evenement('','','','','','','');
        $form = $this->createFormBuilder($evenement)
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
            $evenement = $form->getData();
            $evenementService->addEvenement($evenement);
            return $this->render('evenement/create_completed.html.twig',['evenement'=>$evenement]);
        }
        else
            return $this->render('evenement/creer.html.twig',['formulaire'=>$form->createView()]);
    }

    /**
    * @Route("evenement/{pId}","evenement_show")
    */
    public function show($pId, EvenementService $evenementService):Response
    {
        $evenement = $evenementService->getEvenement($pId);
        return $this->render('aniamtion/evenement.html.twig',['evenement'=>$evenement['evenement']]);
    }

    /**
     * @Route("evenement/delete/{pId}","evenement_delete")
     */
    public function delete($pId, EvenementService $evenementService):Response
    {
        $evenementService->delEvenement($pId);
        return $this->render('evenement/delete_completed.html.twig');
    }
}
