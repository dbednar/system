<?php

namespace System\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

    /**
     * @ORM\Entity(repositoryClass="System\UserBundle\Repository\StaffRepository")
     * @ORM\Table(name="staff")
     */

class Staff {
    
     /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ORM\OneToOne(targetEntity="User", inversedBy="staff")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;
    

    
    /**
     * @ORM\Column(type="string", length=45, name="first_name")
     */
    
    private $firstName;
    
    /**
     * @ORM\Column(type="string", length=45, name="surname")
     */
    
    private $surname;
    
  
    
     /**
     * @ORM\Column(type="string", name="add",nullable=true, length=45)
     */
    
    private $address;
   

    /**
     * @ORM\Column(type="string", name="mobile",length=45, nullable=true)
     */
    
    private $mobile;
    
     
   
    /**
     * @ORM\Column(type="date", name="dob",nullable=true)
     */
    
    private $dob;
    
   
    
    /**
     *  @ORM\Column(name="induction_a", type="string",length=45,nullable=true )
     */
    
    private $inductionA;
    
   
    
    /**
     *  @ORM\Column(name="bank_sort_code", type="string",length=45,nullable=true )
     */
    
    private $bankSortCode;
    
    /**
     *  @ORM\Column(name="back_account_no", type="string",length=45,nullable=true )
     */
    
    private $backAccountNo;
    
    /**
     *  @ORM\Column(name="reference1", type="string",length=45,nullable=true )
     */
    
    private $reference1;

    
    private $name;
    
    public function __construct(){

    }
    
    function getId() {
        return $this->id;
    }

    function getUser() {
        return $this->user;
    }

    function getFirstName() {
        return $this->firstName;
    }

    function getSurname() {
        return $this->surname;
    }

    function getAddress() {
        return $this->address;
    }

    function getMobile() {
        return $this->mobile;
    }

    function getDob() {
        return $this->dob;
    }

    function getInductionA() {
        return $this->inductionA;
    }

    function getBankSortCode() {
        return $this->bankSortCode;
    }

    function getBackAccountNo() {
        return $this->backAccountNo;
    }

    function getReference1() {
        return $this->reference1;
    }

    function getName() {
        return $this->getFirstName() . ' '.$this->getSurname();
    }

    function setId($id) {
        $this->id = $id;
    }

    function setUser($user) {
        $this->user = $user;
    }

    function setFirstName($firstName) {
        $this->firstName = $firstName;
    }

    function setSurname($surname) {
        $this->surname = $surname;
    }

    function setAddress($address) {
        $this->address = $address;
    }

    function setMobile($mobile) {
        $this->mobile = $mobile;
    }

    function setDob($dob) {
        $this->dob = $dob;
    }

    function setInductionA($inductionA) {
        $this->inductionA = $inductionA;
    }

    function setBankSortCode($bankSortCode) {
        $this->bankSortCode = $bankSortCode;
    }

    function setBackAccountNo($backAccountNo) {
        $this->backAccountNo = $backAccountNo;
    }

    function setReference1($reference1) {
        $this->reference1 = $reference1;
    }

}
