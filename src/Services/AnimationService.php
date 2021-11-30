<?php
namespace App\Services;

use App\Entity\Animation;
use Doctrine\ORM\EntityManagerInterface;

class AnimationService
{
    private $_listeAnimation=[];
    private $_entityManager;

    function __construct(EntityManagerInterface $em){

        $this->_entityManager = $em;
    }
    public function getList(){

        $this->_listeAnimation = $this->_entityManager
        ->getRepository(Animation::class)
        ->findall();

        return $this->_listeAnimation;
    }
    public function addAnimation($pAnimation){
        array_push($this->_listeAnimation,$pAnimation);
        $this->_entityManager->persist($pAnimation);
        $this->_entityManager->flush();
    }
    public function getAnimation($pId){
        $find = false;
        $animation = $this->_entityManager->getRepository(Animation::class)->find($pId);
        if (isset($animation))
            $find = true;
        return  ['found'=>$find,'animation'=>$animation];
    }
    public function delAnimation($pId){
        $animation = $this->getAnimation($pId);
        if ($animation['found']== true){
            $this->_entityManager->remove($animation['animation']);
            $this->_entityManager->flush();
        }
    }
}