<?php

class AuthorController
{
    private $model = null;
    private $view = null;

    public function __construct($authorModel, $authorView)
    {
        $this->model = $authorModel;
        $this->view = $authorView;
    }

    public function start()
    {
        if (isset($_GET['author-id'])) {
            $authorId = filter_var($_GET['author-id'], FILTER_SANITIZE_NUMBER_INT);
            $one = $this->model->getOneAuthor($authorId);
            $this->view->renderOneAuthorMain($one);
        } 
        else if (isset($_GET['create-author'])){
            if($_GET['create-author'] =="new") {
                $this->view->renderAuthorsFormMain();
            }
        }
        else {
            if(isset($_POST["search-authors"])){
                $searchText = filter_var($_POST["search-authors"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $this->view->renderAuthorsMain($this->model->findAuthors($searchText));
            }
            else {
                $this->view->renderAuthorsMain($this->model->getAllAuthors()); 
            }
        }
    }
}