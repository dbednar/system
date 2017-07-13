<?php

namespace System\ApiBundle\Controller;

use FOS\RestBundle\View\View;
use FOS\RestBundle\Controller\Annotations;
use FOS\RestBundle\View\RouteRedirectView;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Routing\ClassResourceInterface;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\FormTypeInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

/**
 * Class ApiStaffController
 * @package System\ApiBundle\Controller
 * 
 */

class ApiStaffController extends FOSRestController implements ClassResourceInterface{
   
     /**
     * Gets  all Staff
     *
     * @return mixed
     * @throws \Doctrine\ORM\NoResultException
     * @throws \Doctrine\ORM\NonUniqueResultException
     *
     * @ApiDoc(
     * description="This function return all staff",
     *     
     *     statusCodes={
     *         200 = "Returned when successful",
     *         404 = "Return when not found"
     *     }
     * )
     */
    
    public function getStaffAction(){
        $staff = $this->getDoctrine()->getManager()->getRepository("SystemUserBundle:Staff")->findAll();
         if ($staff === null) {
            return new View(null, Response::HTTP_NOT_FOUND);
        }       
      
        return $staff;     
        
    }
    
    /**
     * Gets an individual Staff
     *
     * @param int $id
     * @return mixed
     * @throws \Doctrine\ORM\NoResultException
     * @throws \Doctrine\ORM\NonUniqueResultException
     *
     * @ApiDoc(
     *     output="System\UserBundle\Entity\Staff",
     *     statusCodes={
     *         200 = "Returned when successful",
     *         404 = "Return when not found"
     *     }
     * )
     */
    
    public function putStaffAction(){
        
    }
}
