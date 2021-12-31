<?php

namespace App\Controller;

use app\Entity\Utilisateur;
use App\Services\UtilisateurService;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class UtilisateurController extends AbstractController
{
    /**
     * @Route("/utilisateur", name="utilisateur")
     */
    public function index(): Response
    {
        return $this->render('utilisateur/index.html.twig', [
            'controller_name' => 'UtilisateurController',
        ]);
    }

    /**
     * @Route("/utilisateur/list", name="liste_utilisateur")
     */
    public function list(UtilisateurService $utilisateurService): Response
    {
        $listeUtilisateur = $utilisateurService->getListUtilisateur();
        return $this->render('utilisateur/list.html.twig',['utilisateurList'=>$listeUtilisateur]);
    }

    /**
    * @Route("utilisateur/{pId}","utilisateur_show")
    */
    public function show($pId, UtilisateurService $animationService):Response
    {
        $utilisateur = $animationService->getUtilisateur($pId);
        return $this->render('utilisateur/utilisateur.html.twig',['utilisateur'=>$utilisateur['utilisateur']]);
    }

    /**
     * @Route("utilisateur/delete/{pId}","utilisateur_delete")
     */
    public function delete($pId, UtilisateurService $utilisateurService):Response
    {
        $utilisateurService->delUtilisateur($pId);
        return $this->render('utilisateur/delete_completed.html.twig');
    }

    /**
     * @Route("utilisateur/create","utilisateur_creation")
     */
    public function newUtilisateur(Request $request,UtilisateurService $utilisateurService):Response
    {

        $utilisateur = new Utilisateur('','','','','','','','');
        $form = $this->createFormBuilder($utilisateur)
        ->add('save', SubmitType::class, ['label' => 'Enregistrer'])
            ->getForm();
        $request = Request::createFromGlobals();
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $utilisateur = $form->getData();
            $utilisateurService->addUtilisateur($utilisateur);
            return $this->render('utilisateur/create_completed.html.twig',['utilisateur'=>$utilisateur]);
        }
        else
            return $this->render('utilisateur/creer.html.twig',['formulaire'=>$form->createView()]);
    }
}
