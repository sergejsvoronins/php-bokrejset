<?php
class User {
    private int $id = 0;
    private string $first_name = "";
    private string $last_name = "";
    private string $email = "";
    private string $mobile = "";

    function __construct($id, $first_name, $last_name, $email, $mobile) {
        $this->id = $id;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->mobile = $mobile;
    }
    
    public function getId () : int {
        return $this->id;
    }
    public function getFirstName(): string {
        return $this->first_name;
    }
    public function getLastName () : string {
        return $this->last_name;
    }
    public function getEMail () : string {
        return $this->email;
    }
    public function getMobile () : string {
        return $this->mobile;
    }
}