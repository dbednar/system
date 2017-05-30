<?php

namespace System\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\JsonResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;


/**
 * @Security("has_role('ROLE_USER')")
 */


class DashboardController extends Controller {
    
     /**
     * @Route(
     * "/",
     * name="dashboard",
     * 
     * )
     * 
     * @Template
     */
    public function indexAction(){

        return array();
    }
    
    
    /**
     * @Route(
     * "/dashboard/online",
     * name="online"
     * )
     */
    
    public function onlineAction(){
        
       $personal_id = $this->getUser()->getId();
       
       $result =(isset($personal_id))? $this->get('online_user')->setLastOnline($personal_id):'error';
       $onlineUser = $this->get('online_user')->getOnlineUser();
       return new JsonResponse(array(
          $result=> $result,
          'online' => $onlineUser, 
       ));
    }
    
}
