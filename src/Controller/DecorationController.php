<?php

namespace App\Controller;

use app\Entity\Decoration;
use App\Services\DecorationService;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DecorationController extends AbstractController
{
    /**
     * @Route("/decoration", name="decoration")
     */
    public function index(): Response
    {
        return $this->render('decoration/index.html.twig', ['controller_name' => 'DecorationController',]);
    }

    /**
     * @Route("/decoration/list", name="liste_decoration")
     */
    public function list(DecorationController $decorationService): Response{
        $listeDecoration = $decorationService->getListDecoration();
        return $this->render('decoration/list.html.twig',['decorationList'=>$listeDecoration]);
    }

     /**
     * @Route("decoration/create","decoration_creation")
     */
    public function newDecoration(Request $request,DecorationService $decorationService):Response
    {

        $decoration = new Decoration('','','','','','','');
        $form = $this->createFormBuilder($decoration)
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
            $decoration = $form->getData();
            $decorationService->addDecoration($decoration);
            return $this->render('decoration/create_completed.html.twig',['decoration'=>$decoration]);
        }
        else
            return $this->render('decoration/creer.html.twig',['formulaire'=>$form->createView()]);
    }

    /**
    * @Route("decoration/{pId}","decoration_show")
    */
    public function show($pId, DecorationService $decorationService):Response
    {
        $decoration = $decorationService->getDecoration($pId);
        return $this->render('aniamtion/decoration.html.twig',['decoration'=>$decoration['decoration']]);
    }

    /**
     * @Route("decoration/delete/{pId}","decoration_delete")
     */
    public function delete($pId, DecorationService $decorationService):Response
    {
        $decorationService->delDecoration($pId);
        return $this->render('decoration/delete_completed.html.twig');
    }
}
