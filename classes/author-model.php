<?php

require_once 'db.php';
require_once 'author.php';
class AuthorModel extends DB {

    protected $table = "authors";
    public function convertToAuthorClass (array $authors) : array {
        $classAuthor = [];
        foreach ($authors as $element) {
            $author = new Author ($element["id"], $element["first_name"], $element["last_name"]);
            array_push($classAuthor, $author);
        }
        return $classAuthor;
    }
    public function getAllAuthors() : array{
        return $this->convertToAuthorClass($this->getAll($this->table));
    }
    public function getOneAuthor(int $id) : array{
        $query = "SELECT * FROM $this->table WHERE id = ?";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$id]);
        return $this->convertToAuthorClass($stmt->fetchAll(PDO::FETCH_ASSOC));
    }
    
    public function createAuthor($firstName, $lastName):void{
        $query = "INSERT INTO $this->table (`first_name`, `last_name`) VALUES (?,?)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$firstName, $lastName]);
    }
    public function findAuthors (string $text) : array{
        $query = "SELECT * FROM $this->table WHERE authors.first_name LIKE '%$text%' OR authors.last_name LIKE '%$text%';";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return $this->convertToAuthorClass($stmt->fetchAll(PDO::FETCH_ASSOC));
    }
}