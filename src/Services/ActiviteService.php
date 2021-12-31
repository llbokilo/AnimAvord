<?php
namespace App\Services;

use App\Entity\Activite;
use Doctrine\ORM\EntityManagerInterface;

class ActiviteService
{
    private $_listeActivite=[];
    private $_entityManager;

    function __construct(EntityManagerInterface $em){

        $this->_entityManager = $em;
    }
    public function getListActivite(){
        $this->_listeActivite = $this->_entityManager->getRepository(Activite::class)->findall();

        return $this->_listeActivite;
    }
    public function addActivite($pActivite){
        array_push($this->_listeActivite,$pActivite);
        $this->_entityManager->persist($pActivite);
        $this->_entityManager->flush();
    }
    public function getActivite($pId){
        $find = false;
        $pActivite = $this->_entityManager->getRepository(Activite::class)->find($pId);
        if (isset($pActivite))
            $find = true;
        return  ['found'=>$find,'activite'=>$pActivite];
    }
    public function delActivite($pId){
        $pActivite = $this->getActivite($pId);
        if ($pActivite['found']== true){
            $this->_entityManager->remove($pActivite['activite']);
            $this->_entityManager->flush();
        }
    }
}