<?php

class User {
    private $pswd;
    private $email;

    public function __construct($pswd, $email) {
        $this->pswd = $pswd;
        $this->email = $email;
    }

   // Getters and Setters
    public function getPswd() {
        return $this->pswd;
    }


    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getPassword() {
        return $this->pswd;
    }

    public function setPassword($pswd) {
        $this->pswd = $pswd;
    }
    
    public function __toString() {
        return "User: Email = {$this->email}, 
                Password = {$this->pswd}";
    }
}
?>