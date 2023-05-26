<?php
class Author {
    private int $id = 0;
    private string $first_name = "";
    private string $last_name = "";

    function __construct($id, $first_name, $last_name) {
        $this->id = $id;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
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
}