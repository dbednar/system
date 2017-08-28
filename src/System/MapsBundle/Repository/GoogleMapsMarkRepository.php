<?php

namespace System\MapsBundle\Repository;

use Doctrine\ORM\EntityRepository;

class GoogleMapsMarkRepository extends EntityRepository{
   
   
    public function findGoogleMapsMark($lat,$lang){
         $qb = $this->createQueryBuilder('g');
   return $qb->select('g')
        ->where('g.latitude = :lat')
        ->setParameter('lat',$lat)
        ->andWhere('g.longitude = :lang')   
        ->setParameter('lang',$lang)
        ->getQuery()->getResult();   
        
    }
    
}
