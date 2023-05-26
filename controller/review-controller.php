<?php

class ReviewController
{
    private $model = null;
    private $view = null;

    public function __construct($reviewModel, $reviewView)
    {
        $this->model = $reviewModel;
        $this->view = $reviewView;
    }

    public function start(array $users, array $books):void {

        if (isset($_GET['create-review'])){
            if($_GET['create-review'] =="new") {
                $this->view->renderReviewMain($users, $books);
            }
        }
        else if(isset($_POST["search-reviews"])){
                $searchText = filter_var($_POST["search-reviews"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $this->view->renderReviewTableByPages($this->model->findUsersFromReview($searchText));
        }
        else {

            $this->view->renderReviewTableByPages($this->model->getReviewByRedPages());
        }
    }
}