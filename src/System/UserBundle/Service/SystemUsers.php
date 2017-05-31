<?php

namespace System\UserBundle\Service;


class SystemUsers {
    
    
     public function getChoiceType($user){
        $role = $user->getRoles();
        if($role[0] == "ROLE_STAFF" && $user->getStaff()){
            $role = array(
                'Role Staff' => "ROLE_STAFF",
                'Role User' => "ROLE_USER",
                'Role Admin' => "ROLE_ADMIN",
            );
        }else if($role[0] == "ROLE_CHILD" && $user->getChild()){
            $role = array(
                'Role Child' => "ROLE_CHILD"
            );
        }else if($role[0] == "ROLE_USER"){
            $role = array( 
                "Role User" => "ROLE_USER",
                "Role Staff" => "ROLE_STAFF",
                "Role Admin" => "ROLE_ADMIN",
            );
        } else if($role[0] == "ROLE_ADMIN" ){
            $role = array( 
                "Role Admin" => "ROLE_ADMIN",
                "Role User" => "ROLE_USER",
                "Role Staff" => "ROLE_STAFF",    
            );
        }else if($role[0] == "ROLE_STAFF" ){
            $role = array( 
                "Role Staff" => "ROLE_STAFF",   
                "Role Admin" => "ROLE_ADMIN",
                "Role User" =>  "ROLE_USER",
                'Role Child' => "ROLE_CHILD",
            );
        }else if($role[0] == "ROLE_CHILD" ){
            $role = array( 
                "Role Child" => "ROLE_CHILD",
                "Role Staff" => "ROLE_STAFF",   
                "Role Admin" => "ROLE_ADMIN",
                "Role User" => "ROLE_USER",     
            );
        }
        
        return $role;
    }
}
