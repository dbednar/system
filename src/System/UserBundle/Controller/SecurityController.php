<?php


namespace System\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class SecurityController extends Controller {
    
    /**
     * @Route("/login", name="fos_security_login" )
     * @Template("SystemUserBundle:Security:login.html.twig")
     * 
     * @return \Symfony\Component\HttpFoundation\Response
     */
    
    public function loginAction(){
        $authenticationUtils = $this->get('security.authentication_utils');
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();
        
        if($this->getUser()){
            return $this->redirectToRoute('dashboard');
        }

        return array(
                'last_username' => $lastUsername,
                'error' => $error,
        );
    }
    
    
}
