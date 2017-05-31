<?php


namespace System\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\JsonResponse;

use FOS\UserBundle\Event\GetResponseUserEvent;
use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\Event\FormEvent;

use System\UserBundle\Form\Type\AdminEditUserType;
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
        $userManager = $this->container->get('fos_user.user_manager');
        $users = $userManager->findUsers();
    
        return array(
            'users'=> $users,
        );
    }
    
        /**
     * @Route(
     * "/admin/register",
     * name="user_register"
     * )
     * 
     */
    
    public function registerAction(Request $request){
        /** @var $userManager \FOS\UserBundle\Model\UserManagerInterface */
        $userManager = $this->container->get('fos_user.user_manager');
       /** @var $formFactory \FOS\UserBundle\Form\Factory\FactoryInterface */
        $formFactory = $this->container->get('fos_user.registration.form.factory');
        /** @var $dispatcher \Symfony\Component\EventDispatcher\EventDispatcherInterface */
        $dispatcher = $this->container->get('event_dispatcher');
        
        $user = $userManager->createUser();
        $user->setEnabled(true);

        $event = new GetResponseUserEvent($user, $request);
        $dispatcher->dispatch(FOSUserEvents::REGISTRATION_INITIALIZE, $event);


        if (null !== $event->getResponse()) {
            return $event->getResponse();
        }

        $form = $formFactory->createForm();
        $user->setRoles(array(''));
        $form->setData($user);

        $form->handleRequest($request);


           if($form->isSubmitted()){
                if ($form->isValid()) {
                $event = new FormEvent($form, $request);
            
                $userManager->updateUser($user = $form->getData());
                
                $users = $userManager->findUsers();
                $table = $this->renderView("SystemUserBundle:System:List/sytemUserList.html.twig",array(
                    'users'=> $users,
                ));
                 return new JsonResponse(array(
                     'table' => $table,
               ));
           }    
          
                } 
                        
        return $this->render("SystemUserBundle:System:Form/registerUser.html.twig",array(
            'form' => $form->createView(),
        ));
    }
    
     /**
     * @Route(
     * "/editUser/{id}",
     * name="system_editUser",
     * options = { "expose" = true },
     * )
     * @Template
     */
    
    public function editUserAction(Request $request,$id){
        $em = $this->getDoctrine()->getManager();

        $user = $em->getRepository('SystemUserBundle:User')->find($id);
        $role =$this->get('app.system_user')->getChoiceType($user);
        
        
        $form= $this->createForm(AdminEditUserType::class,$user,$options = array(
            'role' => $role, 
        ));
        
        if($user->getRole() == 'ROLE_USER' || empty($user->getRole()) ){ 
            $userRole = array('ROLE_USER');
        }
        else{
            $userRole = $user->getRole();
            
        }
        
        $form->get('roles')->setData($userRole);
        
        $form->handleRequest($request);
        if($form->isValid()){
           $em->persist($user);
           $em->flush();
           
           $table = $this->renderView("SystemUserBundle:System:List/sytemUserList.html.twig",array(
               'users'=>$em->getRepository('SystemUserBundle:User')->findAll(),
           ));
           return new JsonResponse(array(
               'table' => $table,
           ));
        }
        return $this->render("SystemUserBundle:System:Form/editUser.html.twig",array(
            'form'=> $form->createView(),
        ));    
    }
    
    
    
}
