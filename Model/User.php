<?php

// NAMESPACE

namespace Francois\Projet\Model ;

// CLASSE 

class User extends Database {

    // METHODE QUI PERMET DE SE CONNECTER

    public function login($pseudo, $password) { 
    
        $sql = "SELECT * FROM users WHERE pseudo = '$pseudo' ";
        $data = $this->executeRequest($sql) ;
        $result = $data->fetch() ;
        $isPasswordValid = password_verify($password, $result['password']) ;
        return [
            'result' =>$result ,
            'isPasswordValid' => $isPasswordValid
        ];
    }
}