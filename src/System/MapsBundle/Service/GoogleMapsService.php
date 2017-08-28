<?php
namespace System\MapsBundle\Service;
use Doctrine\ORM\EntityManager;

use System\MapsBundle\Entity\GoogleMapsMark;


class GoogleMapsService {
   
    
    private $em;
    const ENTITY_NAME = "SystemMapsBundle:GoogleMapsMark";
    
    public function __construct(EntityManager $em){
        $this->em = $em;
    }
    
    public function findMarks($idMarks){
        return $this->em->getRepository(self::ENTITY_NAME)->find($idMarks);
    }

    public function findMarkWithData($latitude,$longitude){
        
        return $this->em->getRepository(self::ENTITY_NAME)->findGoogleMapsMark($latitude,$longitude);
    }
    
    public function getAllMarker(){
       
        $results=$this->em->getRepository(self::ENTITY_NAME)->findAll();
        return $results;
    }
    
    public function findGoogleMapsMarker($dataMarker){
        return $findGoogleMapsMarker = $this->em->getRepository(self::ENTITY_NAME)->findBy(array(
           'latitude' =>  $dataMarker['latitude'],'longitude'=>$dataMarker['longitude']
        ));
    }
    
    public function saveMarker($dataMarker){
    

        if(!is_object($findGoogleMapsMarker=$this->findGoogleMapsMarker($dataMarker))){
            $googleMapsMarker = $this->setMarker($dataMarker);
        }else{
            return $findGoogleMapsMarker[0]->getId();
        }
        return $googleMapsMarker->getId();
    }

    public function setMarker($data){

        $googleMapsMarker = new GoogleMapsMark(); 
        $googleMapsMarker->setTitle($data['title']);
        $googleMapsMarker->setLatitude($data['latitude']);
        $googleMapsMarker->setLongitude($data['longitude']);
                $this->save($googleMapsMarker);
        return $googleMapsMarker;
    }
    
    public function save($data){
        $this->em->persist($data);
        $this->em->flush();
    }
}
