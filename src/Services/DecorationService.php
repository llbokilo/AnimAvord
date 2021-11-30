<?php
namespace App\Services;

use App\Entity\Decoration;
use Doctrine\ORM\EntityManagerInterface;

class DecorationService
{
    private $_listeDecoration=[];
    private $_entityManager;

    function __construct(EntityManagerInterface $em){

        $this->_entityManager = $em;
    }
    public function getList(){

        $this->_listeDecoration = $this->_entityManager
        ->getRepository(Decoration::class)
        ->findall();

        return $this->_listeDecoration;
    }
    public function addDecoration($pDecoration){
        array_push($this->_listeDecoration,$pDecoration);
        $this->_entityManager->persist($pDecoration);
        $this->_entityManager->flush();
    }
    public function getDecoration($pId){
        $find = false;
        $decoration = $this->_entityManager->getRepository(Decoration::class)->find($pId);
        if (isset($decoration))
            $find = true;
        return  ['found'=>$find,'decoration'=>$decoration];
    }
    public function delDecoration($pId){
        $decoration = $this->getDecoration($pId);
        if ($decoration['found']== true){
            $this->_entityManager->remove($decoration['decoration']);
            $this->_entityManager->flush();
        }
    }
}