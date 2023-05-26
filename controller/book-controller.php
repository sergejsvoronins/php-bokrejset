<?php

class BookController
{
    private $model = null;
    private $view = null;

    public function __construct($bookModel, $bookView)
    {
        $this->model = $bookModel;
        $this->view = $bookView;
    }

    public function start(array $authors)
    {
        if (isset($_GET['book-id'])) {
            $bookId = filter_var($_GET['book-id'], FILTER_SANITIZE_NUMBER_INT);
            $one = $this->model->getOneBook($bookId);
            $this->view->renderOneBookMain($one);
        } 
        else if (isset($_GET['create-book'])){
            if($_GET['create-book'] =="new") {
                $this->view->renderBooksFormMain($authors);
            }
        }
        else {
            if(isset($_POST["search-books"])){
                $searchText = filter_var($_POST["search-books"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $this->view->renderBooksMain($this->model->findBooks($searchText));
            }
            else {
                $this->view->renderBooksMain($this->model->getAllBooks()); 
            }
        }
    }
}