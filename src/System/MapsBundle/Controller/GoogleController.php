<?php

namespace System\MapsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use System\MapsBundle\Form\Type\GoogleMapsMarkType;
class GoogleController extends Controller{
	
    /**
     * @Route("/", name="google_maps")
     * @Template
     */
    
    public function indexAction(){
        return array(
            'marks'=>  $this->get('google_maps.mark')->getAllMarker(),
        );
    }
    /**
     * @Route("/add-geolocation/{idMarks}",name="add_geolocation",
     * options={"expose"=true},defaults={"idMarks":0},requirements={"idMarks": "\d+"})
     * 
     */
    public function saveGeolocationAction(Request $request,$idMarks){
       
            $service = $this->get('google_maps.mark');
    
        if($idMarks == 0){
            $idMarks = $service->saveMarker($request->request->all());
        }

        $form =$this->createForm(GoogleMapsMarkType::class,$service->findMarks($idMarks));
        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid()){
            
        }
        
        return $this->render("SystemMapsBundle:Google:Form/googleMapsMarkForm.html.twig",array(
            'form'=>$form->createView(),
        ));
    } 
    
}