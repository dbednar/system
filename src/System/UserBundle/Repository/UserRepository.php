<?php

namespace System\UserBundle\Repository;

use Doctrine\ORM\EntityRepository;

class UserRepository extends EntityRepository {
    
    const ENTITY_NAME = "SystemUserBundle:User";
    
     public function getOnlineUsers(){
        $date = new \DateTime(date("Y-m-d, H:i:s", strtotime("-5 minute")));

        return $this->_em->createQueryBuilder()
                        ->select('u')
                        ->from(self::ENTITY_NAME, 'u')
                        ->where('u.lastLogin >= :date or u.lastOnline >= :date')
                        ->setParameter('date',$date)
                        ->getQuery()->getResult();
    }
    
}
