<?php

require "view.php";
class BookView extends View {

    public function renderAllBooks(array $books):void {
        echo "<div>";
        foreach($books as $book){
            echo "<a href='?book-id={$book->getId()}'>";
            echo "<div>{$book->getTitle()} ({$book->getYear()})</div>";
            echo "</a>";
        }
        echo "</div>";
    }
    public function renderSingleBook (array $book):void {

                echo "<h2>{$book[0]->getTitle()}</h2>";
                echo "<h3>År: {$book[0]->getYear()}</h3>";
    }
    public function renderCreateBookForm (array $authors) {
        echo "<form action='form-handlers/book-form-handler.php' method='POST'>
            <div>
                <label for='title'>Titel</label>
                <input type='text' id='title' name='title'>
            </div>
            <div>
                <label for='year'>Publicerad:</label>
                <input type='text' id='year' name='year'>
            </div>
            <div>
                <label for='authors'>Författare:</label>
                <select name='author_id' id='authors'>
                    <option value=''>--Välj från listan--</option>";
                    foreach($authors as $author){
                        echo "<option value='{$author->getId()}'>{$author->getFirstName()} {$author->getLastName()}</option>";
                    }
                echo "</select>
                <a href='authors.php?create=new'>Lägg till</a>
            </div>";
            echo "<button class='btn'>Skapa</button>";
            echo "</form>";
    }

    public function renderBooksMain(array $books) {
        echo "<main>";
            echo "<section class='header_section'>";
                echo "<h1>Boklista</h1>";
            echo "</section>";
            echo "<section class='search_section'>";
                $this->createSearchField("books");
            echo "</section>";
            echo "<section class='create_btn_section'>";
                $this->renderCreateButton("book");
            echo "</section>";
            echo "<section class='main_content'>";
                if(count($books)>0){
                     $this->renderAllBooks($books);
                }
                else {
                    $this->renderCanNotFind();
                }
            echo "</section>";
        echo "</main>";
    }
    public function renderBooksFormMain (array $authors) {
        echo "<main>";
            echo "<section class='header_section'>";
                echo "<h1>Lägg ny bok</h1>";
            echo "</section>";
            echo "<section class='create_form_section'>";
                $this->renderCreateBookForm($authors);
            echo "</section>";
        echo "</main>";
    }
    public function renderOneBookMain (array $book) {
        echo "<main>";
            echo "<section>";
                $this->renderSingleBook($book);
            echo "</section>";
        echo "</main>";
    }
}
?>
