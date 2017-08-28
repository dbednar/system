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
     * @Route("/maps-mark", name="google_maps")
     * @Template
     */
    
    public function indexAction(){
      
        return array(
            'marks'=>  $this->get('google_maps.mark')->getAllMarker(),
        );
    }
    /**
     * @Route("/add-geolocation/{latitude}/{longitude}",name="add_geolocation",
     * options={"expose"=true},defaults={"longitude":0,"latitude":0},requirements={"idMarks": "\d+"})
     * 
     */
    public function saveGeolocationAction(Request $request,$latitude,$longitude){
       
        $service = $this->get('google_maps.mark');
    
        if($latitude == 0 && $longitude ==0 ){
            $idMarks = $service->saveMarker($request->request->all());
            $marks = $service->findMarks($idMarks);
           
        }else{
            $marks = $service->findMarkWithData($latitude,$longitude);
            $marks = ($marks[0])?$marks[0] : '';
      
        }
        
        $form =$this->createForm(GoogleMapsMarkType::class,$marks);
        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid()){
            
        }
        
        return $this->render("SystemMapsBundle:Google:Form/googleMapsMarkForm.html.twig",array(
            'form'=>$form->createView(),
        ));
    } 
    
}