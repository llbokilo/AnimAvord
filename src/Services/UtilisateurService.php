<?php
namespace App\Services;

use App\Entity\Utilisateur;
use Doctrine\ORM\EntityManagerInterface;

class UtilisateurService
{
    private $_listeUtilisateur=[];
    private $_entityManager;

    function __construct(EntityManagerInterface $em){

        $this->_entityManager = $em;
    }
    public function getListUtilisateur(){
        $this->_listeUtilisateur = $this->_entityManager->getRepository(Utilisateur::class)->findall();

        return $this->_listeUtilisateur;
    }
    public function addUtilisateur($pUtilisateur){
        array_push($this->_listeUtilisateur,$pUtilisateur);
        $this->_entityManager->persist($pUtilisateur);
        $this->_entityManager->flush();
    }
    public function getUtilisateur($pId){
        $find = false;
        $pUtilisateur = $this->_entityManager->getRepository(Utilisateur::class)->find($pId);
        if (isset($pUtilisateur))
            $find = true;
        return  ['found'=>$find,'utilisateur'=>$pUtilisateur];
    }
    public function delUtilisateur($pId){
        $pUtilisateur = $this->getUtilisateur($pId);
        if ($pUtilisateur['found']== true){
            $this->_entityManager->remove($pUtilisateur['utilisateur']);
            $this->_entityManager->flush();
        }
    }
}