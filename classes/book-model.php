<?php

require_once 'db.php';
require 'book.php';
class BookModel extends DB {

    protected $table = "books";
    public function convertToBookClass (array $books) : array {
        $classBooks = [];
        foreach ($books as $element) {
            $book = new Book ($element["id"], $element["title"], $element["year"]);
            array_push($classBooks, $book);
        }
        return $classBooks;
    }
    public function getAllBooks() : array{
        return $this->convertToBookClass($this->getAll($this->table));
    }
    public function getOneBook( int $id ) : array{
        $query = "SELECT * FROM $this->table WHERE id = ?";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$id]);
        return $this->convertToBookClass($stmt->fetchAll(PDO::FETCH_ASSOC));
        
    }
    public function createBook (string $title,  int $year, int $authorId) : void {
        $query = "INSERT INTO $this->table (`title`, `year`, `author_id`) VALUES (?,?,?)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$title, $year, $authorId]);
    }
    public function findBooks (string $text) : array{
        $query = "SELECT * FROM $this->table WHERE books.title LIKE '%$text%';";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return $this->convertToBookClass($stmt->fetchAll(PDO::FETCH_ASSOC));
    }
    public function getAllBooksWithStudentsCount () : array {
        $query = "SELECT *, COUNT(books.id) AS 'students_count' FROM $this->table
                    JOIN userbook ON userbook.book_id = books.id
                    GROUP BY books.id;";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}