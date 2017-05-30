<?php

namespace System\UserBundle\Service;

use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;

class OnlineUsers {
    
    const ENTITY_NAME = 'SystemUserBundle:User';

    private $em;
    private $templating;
    public function __construct(EntityManager $em,EngineInterface $templating)
    {
        $this->em = $em;
        $this->templating = $templating;
    }
 
    
    public function setLastOnline($id){
        
        $userDetails = $this->em->getRepository(self::ENTITY_NAME)->find($id);
        $userDetails->setLastOnline(new \DateTime());
        $this->em->flush();

        return 'success';
        
    }
    
    
    public function getOnlineUser(){   
        return $this->templating->render("SystemUserBundle:Dashboard:onlineUser.html.twig", array(
            'users' => $this->em->getRepository(self::ENTITY_NAME)->getOnlineUsers(),
        )); 

    }
    
}
