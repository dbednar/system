<?php

namespace System\UserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="System\UserBundle\Repository\UserRepository")
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=60, name="avatar", nullable=true)
     */
    protected $avatar;
    
    /**
     * @ORM\OneToOne(targetEntity="Staff", mappedBy="user", cascade={"persist","remove"})
     */
    private $staff;
    
    /**
     * @ORM\Column(name="last_online", type="datetime" ,nullable=true) 
     */
    
    private $lastOnline;
    
    public function __construct()
    {
        parent::__construct();
        $this->roles = array();
    }
    
    function getId() {
        return $this->id;
    }

    function getAvatar() {
        return $this->avatar;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setAvatar($avatar) {
        $this->avatar = $avatar;
    }

    function getStaff() {
        return $this->staff;
    }

    function getLastOnline() {
        return $this->lastOnline;
    }

    function setStaff($staff) {
        $this->staff = $staff;
    }

    function setLastOnline($lastOnline) {
        $this->lastOnline = $lastOnline;
    }
public function getRoles()
    {
        $roles = $this->roles;
        foreach ($this->getGroups() as $group) {
            $roles = array_merge($roles, $group->getRoles());
        }
        if(empty($roles)){
        $roles[] = static::ROLE_DEFAULT;
        
        }
        return array_unique($roles);
    }
     public function getRole() {
        return $this->roles;
    }

}