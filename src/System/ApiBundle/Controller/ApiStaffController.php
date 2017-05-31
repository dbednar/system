<?php

namespace System\ApiBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;


class ApiStaffController extends FOSRestController{
   
    public function getStaffAction(){
        $staff = $this->getDoctrine()->getManager()->getRepository("SystemUserBundle:Staff")->findAll();
        $data = [
            'name'=> 'Damian',
            
        ];
                
            $view = $this->view($staff,200);
    return $this->handleView($view);     
        
    }
    
}
