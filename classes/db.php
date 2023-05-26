<?php

class DB {

    protected $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAll($table)
    {
        if($table == "userbook"){
            $query = "SELECT ub.id, ub.user_id, ub.book_id, ub.pages, ub.comment, u.first_name, u.last_name, u.email, u.mobile, b.title FROM `userbook` AS ub 
            JOIN users AS u ON u.id=ub.user_id 
            JOIN books AS b ON b.id=ub.book_id";
        }
        else {
            $query = "SELECT * FROM $table";
        }
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);   
    }


    

}