<?php

require "view.php";
class ReviewView extends View {

    public function renderCreateReview ($users, $books) {
        echo "<form action='form-handlers/userbook-form-handler.php' method='POST'>";
            echo "<div>
                    <label for='user_id'>Välj student:</label>
                    <select name='user_id' id='user_id'>
                        <option value=''>--Välj från listan--</option>";
                        foreach($users as $user){
                            echo "<option value='{$user->getId()}'>{$user->getFirstName()} {$user->getLastName()}</option>";
                        } 
                    echo "</select>
                    <a href='users.php?create-user=new'>Lägg till</a>
                </div>
                <div>
                    <label for='book_id'>Välj bok:</label>
                    <select name='book_id' id='book_id'>
                        <option value=''>--Välj från listan--</option>";
                        foreach($books as $book){
                            echo "<option value='{$book->getId()}'>{$book->getTitle()} {$book->getYear()}</option>";
                        } 
                    echo "</select>
                    <a href='books.php?create-book=new'>Lägg till</a>
                </div>
                <div>
                    <label for='pages'>Antal sidor:</label>
                    <input type='text' id='pages' name='pages'>
                </div>
                <div>
                    <label for='comment'>Recension:</label>
                    <textarea  id='comment' name='comment'>
                    </textarea>
                </div>";
            echo "<button class='btn'>Skapa</button>";
        echo "</form>";
    }
    public function renderReviewTableByPages (array $reviews) {
        echo "<main>";
            echo "<section class='header_section'>";
                echo "<h1>Revy tabell</h1>";
            echo "</section>";
            echo "<section class='search_section'>";
                $this->createSearchField("reviews");
            echo "</section>";
            echo "<section class='create_btn_section'>";
                $this->renderCreateButton("review");
            echo "</section>";
            echo "<section class='main_content_review'>";
                if(count($reviews)>0){
                    echo "<table>";
                        echo "<tr>";
                            echo "<th>Plats</th>";
                            echo "<th>Förnamn</th>";
                            echo "<th>Efternamn</th>";
                            echo "<th>Antal lästa böcker</th>";
                            echo "<th>Antal lästa sidor</th>";
                        echo "</tr>";
                        for ($i=0; $i < count($reviews); $i++) { 
                            echo "<tr>";
                                echo "<td>". $i+1 ."</td>";
                                echo "<td>{$reviews[$i]['first_name']}</td>";
                                echo "<td>{$reviews[$i]['last_name']}</td>";
                                echo "<td>{$reviews[$i]['books_amount']}</td>";
                                echo "<td>{$reviews[$i]['number_of_pages']}</td>";
                        echo "</tr>";
                        }
                    echo "</table>";
                }
                else {
                    $this->renderEmptyInfoDiv();
                }
            echo "</section>";
        echo "</main>";
    }
    public function renderReviewMain (array $users, array $books) {
        echo "<main>";
            echo "<section class='header_section'>";
                echo "<h1>Registrera lästa boken</h1>";
            echo "</section>";
            echo "<section class='create_form_section'>";
                $this->renderCreateReview($users, $books);
            echo "</section>";
        echo "</main>";
    }

}