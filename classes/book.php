<?php
class Book {
    private int $id = 0;
    private string $title = "";
    private int $year = 0;

    function __construct($id, $title, $year) {
        $this->id = $id;
        $this->title = $title;
        $this->year = $year;
    }

    public function getTitle (): string {
        return $this->title;
    }
    public function getId () : int {
        return $this->id;
    }
    public function getYear () : int {
        return $this->year;
    }
}