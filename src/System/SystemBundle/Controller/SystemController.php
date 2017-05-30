<?php

namespace System\SystemBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * @Route(
 * "/system",
 * )
 */
class SystemController extends Controller{
  
     /**
     * @Route(
     * "/users",
     * name="system_user"
     * )
     * @Template
     */
    
    public function usersAction(Request $request){
        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository("SystemUserBundle:User")->findAll();

        return array(
            'users'=> $users,
        );
    }
    
    
}
