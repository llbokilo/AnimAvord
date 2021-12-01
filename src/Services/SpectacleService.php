<?php
namespace App\Services;

use App\Entity\Spectacle;
use Doctrine\ORM\EntityManagerInterface;

class SpectacleService
{
    private $_listeSpectacle=[];
    private $_entityManager;

    function __construct(EntityManagerInterface $em){

        $this->_entityManager = $em;
    }
    public function getListSpectacle(){
        $this->_listeSpectacle = $this->_entityManager->getRepository(Spectacle::class)->findall();

        return $this->_listeSpectacle;
    }
    public function addSpectacle($pSpectacle){
        array_push($this->_listeSpectacle,$pSpectacle);
        $this->_entityManager->persist($pSpectacle);
        $this->_entityManager->flush();
    }
    public function getSpectacle($pId){
        $find = false;
        $spectacle = $this->_entityManager->getRepository(Spectacle::class)->find($pId);
        if (isset($spectacle))
            $find = true;
        return  ['found'=>$find,'spectacle'=>$spectacle];
    }
    public function delSpectacle($pId){
        $spectacle = $this->getSpectacle($pId);
        if ($spectacle['found']== true){
            $this->_entityManager->remove($spectacle['spectacle']);
            $this->_entityManager->flush();
        }
    }
}