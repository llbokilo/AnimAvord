<?php
namespace App\Services;

use App\Entity\Evenement;
use Doctrine\ORM\EntityManagerInterface;

class EvenementService
{
    private $_listeEvenement=[];
    private $_entityManager;

    function __construct(EntityManagerInterface $em){

        $this->_entityManager = $em;
    }
    public function getListEvenement(){
        $this->_listeEvenement = $this->_entityManager->getRepository(Evenement::class)->findall();

        return $this->_listeEvenement;
    }
    public function addEvenement($pEvenement){
        array_push($this->_listeEvenement,$pEvenement);
        $this->_entityManager->persist($pEvenement);
        $this->_entityManager->flush();
    }
    public function getEvenement($pId){
        $find = false;
        $evenement = $this->_entityManager->getRepository(Evenement::class)->find($pId);
        if (isset($evenement))
            $find = true;
        return  ['found'=>$find,'evenement'=>$evenement];
    }
    public function delEvenement($pId){
        $evenement = $this->getEvenement($pId);
        if ($evenement['found']== true){
            $this->_entityManager->remove($evenement['evenement']);
            $this->_entityManager->flush();
        }
    }
}