<?php


namespace System\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;



/**
 * @Route(
 * "/staff"
 * )
 */
class UserProfileController extends Controller {
    
    
       /**
     * @Route(
     * "/{id}",
     * name="user",
     * defaults = { "id" = 0 },
     * requirements={"id": "\d+"}
     * )
     * @Template
     */
     
    public function indexAction($id){
        $id =($id==0)? $this->getUser()->getStaff()->getId():$id;
        $em = $this->getDoctrine()->getManager();
        $staff = $em->getRepository("SystemUserBundle:Staff")->find($id);
        
       
       $view= $this->renderView("SystemUserBundle:UserProfile:overView.html.twig");
        return array(
            'staff' => $staff,
            'id' => $id,
            'view' => $view,
        );
    }
}
