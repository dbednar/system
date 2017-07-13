<?php

namespace System\MapsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * @ORM\Entity
 * @ORM\Table(name="google_maps_mark")
 */

class GoogleMapsMark {
    
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    public $id;
    
    /**
     * @ORM\Column(name="title_geolocation",type="string", length=45)
     * @Assert\NotBlank()
     */
    
    public $title;
    
    /**
     * @ORM\Column(name="latitude",type="float")
     * @Assert\NotBlank()
     */
    
    public $latitude;
    
    /**
     * @ORM\Column(name="longitude",type="float")
     * @Assert\NotBlank()
     */
    
    public $longitude;

    /**
     * @ORM\Column(name="color_point",type="string",nullable=true)
     * @Assert\NotBlank()
     */
    public $colorPoint;
    
    function getId() {
        return $this->id;
    }

    function getTitle() {
        return $this->title;
    }

    function getLatitude() {
        return $this->latitude;
    }

    function getLongitude() {
        return $this->longitude;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setTitle($title) {
        $this->title = $title;
    }

    function setLatitude($latitude) {
        $this->latitude = $latitude;
    }

    function setLongitude($longitude) {
        $this->longitude = $longitude;
    }

    function getColorPoint() {
        return $this->colorPoint;
    }

    function setColorPoint($colorPoint) {
        $this->colorPoint = $colorPoint;
    }

}
