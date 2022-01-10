<?php

namespace App\Controller;

use App\Entity\Activite;
use app\Entity\TypeActivite;
use App\Services\ActiviteService;
use DateTime;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class ActiviteController extends AbstractController
{
    /**
     * @Route("/activite", name="activite")
     */
    public function index(): Response
    {
        return $this->render('activite/index.html.twig', [
            'controller_name' => 'ActiviteController',
        ]);
    }

    /**
     * @Route("/activite/list", name="liste_activite")
     */
    public function list(ActiviteService $activiteService): Response{
        $listeActivite = $activiteService->getListActivite();
        return $this->render('activite/list.html.twig',['activiteList'=>$listeActivite]);
    }

    /**
     * @Route("/activite/animation", name="liste_activite_animation")
     */
    public function listAnimation(ActiviteService $activiteService): Response{
        $listeActivite = $activiteService->getListActiviteAnimation();
        return $this->render('activite/list_animation.html.twig',['activiteList'=>$listeActivite]);
    }

    /**
     * @Route("/activite/decoration", name="liste_activite_decoration")
     */
    public function listDecoration(ActiviteService $activiteService): Response{
        $listeActivite = $activiteService->getListActiviteDecoration();
        return $this->render('activite/list_decoration.html.twig',['activiteList'=>$listeActivite]);
    }

    /**
     * @Route("/activite/evenement", name="liste_activite_evenement")
     */
    public function listEvenement(ActiviteService $activiteService): Response{
        $listeActivite = $activiteService->getListActiviteEvenement();
        return $this->render('activite/list_evenement.html.twig',['activiteList'=>$listeActivite]);
    }

    /**
     * @Route("/activite/spectacle", name="liste_activite_spectacle")
     */
    public function listSpectacle(ActiviteService $activiteService): Response{
        $listeActivite = $activiteService->getListActiviteSpectacle();
        return $this->render('activite/list_spectacle.html.twig',['activiteList'=>$listeActivite]);
    }

    /**
     * @Route("activite/create","activite_creation")
     */
    public function newActivite(Request $request,ActiviteService $activiteService):Response
    {
        $activite = new Activite('','','','','','','', NULL,'',NULL);
        $form = $this->createFormBuilder($activite)
            // ->add('typeActivite', TextType::class)
            ->add('Titre', TextType::class)
            //->add('Debut', DateType::class)
            //->add('Fin', DateType::class)
            //->add('Photo', TextType::class)
            //->add('Histo', TextType::class)
            //->add('Loterie', TextType::class)
            ->add('Description', TextType::class)
            //->add('Date_creation', DateType::class)
            //->add('Utilisateur_creation', TextType::class)
            ->add('save', SubmitType::class, ['label' => 'Enregistrer'])
            ->getForm();
        $request = Request::createFromGlobals();
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $activite = $form->getData();
            $activiteService->addActivite($activite);
            return $this->render('activite/create_completed.html.twig',['activite'=>$activite]);
        }
        else
            return $this->render('activite/creer.html.twig',['formulaire'=>$form->createView()]);     
    }

    /**
    * @Route("activite/{pId}","activite_show")
    */
    public function show($pId, ActiviteService $activiteService):Response
    {
        $activite = $activiteService->getActivite($pId);
        return $this->render('activite/activite.html.twig',['activite'=>$activite['activite']]);
    }

    /**
    * @Route("activite/animation/{pId}","activite_animation_show")
    */
    public function showAnimation($pId, ActiviteService $activiteService):Response
    {
        $activite = $activiteService->getActivite($pId);
        return $this->render('activite/activite_animation.html.twig',['activite'=>$activite['activite']]);
    }

    /**
    * @Route("activite/decoration/{pId}","activite_decoration_show")
    */
    public function showDecoration($pId, ActiviteService $activiteService):Response
    {
        $activite = $activiteService->getActivite($pId);
        return $this->render('activite/activite_decoration.html.twig',['activite'=>$activite['activite']]);
    }

    /**
    * @Route("activite/evenement/{pId}","activite_evenement_show")
    */
    public function showEvenement($pId, ActiviteService $activiteService):Response
    {
        $activite = $activiteService->getActivite($pId);
        return $this->render('activite/activite_evenement.html.twig',['activite'=>$activite['activite']]);
    }

    /**
    * @Route("activite/spectacle/{pId}","activite_spectacle_show")
    */
    public function showSpectacle($pId, ActiviteService $activiteService):Response
    {
        $activite = $activiteService->getActivite($pId);
        return $this->render('activite/activite_spectacle.html.twig',['activite'=>$activite['activite']]);
    }

    /**
     * @Route("activite/delete/{pId}","activite_delete")
     */
    public function delete($pId, ActiviteService $activiteService):Response
    {
        $activiteService->delActivite($pId);
        return $this->render('activite/delete_completed.html.twig');
    }

}
