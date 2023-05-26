<?php
require_once 'db.php';
class ReviewModel extends DB {

    protected $table = "userbook";
    public function createReview (int $userId, int $bookId, int $pages, string $comment) : void{
        $query = "INSERT INTO $this->table (`user_id`, `book_id`, `pages`, `comment`) VALUES (?,?,?,?)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$userId, $bookId, $pages, $comment]);
    }
    public function getReviewByRedPages (): array {
        $query = "SELECT users.first_name, users.last_name, COUNT(userbook.user_id) AS 'books_amount', SUM(userbook.pages) AS 'number_of_pages' FROM `userbook` JOIN users ON users.id = userbook.user_id
                    GROUP BY userbook.user_id
                    ORDER BY  number_of_pages DESC;";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function findUsersFromReview (string $text) : array{
        $query = "SELECT users.first_name, users.last_name, COUNT(userbook.user_id) AS 'books_amount', SUM(userbook.pages) AS 'number_of_pages' FROM `userbook` JOIN users ON users.id = userbook.user_id
        WHERE users.first_name LIKE '%$text%' OR users.last_name LIKE '%$text%'
        GROUP BY userbook.user_id
        ORDER BY  number_of_pages DESC;";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}