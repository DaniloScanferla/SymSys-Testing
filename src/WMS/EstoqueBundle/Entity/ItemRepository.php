<?php

namespace WMS\EstoqueBundle\Entity;

use Doctrine\ORM\EntityRepository;

class ItemRepository extends EntityRepository
{
    public function fetchPairs(){
        
        $entities = $this->findAll();
        $array = array();
        
        foreach($entities as $entity){
            $array[$entity->getId()] = $entity->getNome();
        }
        
        return $array;
    }
}
