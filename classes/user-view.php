<?php
require "view.php";

class UserView extends View{

    public function renderAllUserAsClickableList (array $users):void {
        echo "<div>";
        foreach($users as $user){
            echo "<a href='?user-id={$user->getId()}'>";
            echo "<div>{$user->getFirstName()} {$user->getLastName()}</div>";
            echo "</a>";
        }
        echo "</div>";
    }
    public function renderDeleteButton (int $id) {
        echo "<a href='?user-id={$id}&action=delete'>Ta bort</a>";
    }
    public function renderDeleteConfirmation () {
        echo "<main>";
            echo "<section class='main_content'>";
                echo "<h3>Användaren har blivit raderat</h3>";
                echo "<a href='users.php'>Tillbaka</a>";
            echo "</section>";
        echo "</main>";
    }
    
    public function renderCreateUserForm () {
        echo "<form action='form-handlers/user-form-handler.php' method='POST'>";
        echo "<div>
        <label for='first_name'>Förnamn:</label>
                    <input type='text' id='first_name' name='first_name'>
                    </div>
                <div>
                <label for='last_name'>Efternamn:</label>
                    <input type='text' id='last_name' name='last_name'>
                </div>
                <div>
                <label for='email'>Epost:</label>
                <input type='email' id='email' name='email'>
                </div>
                <div>
                <label for='mobile'>Mobil:</label>
                    <input type='number' id='mobile' name='mobile'>
                </div>";
        echo "<button class='btn'>Skapa</button>";
        echo "</form>";
    }
    public function renderAllUserComments (array $userComments) {
        echo "<h2>Kommentarer</h2>";
        if(count($userComments)>0){
            echo "<ul>";
            foreach ($userComments as $uc) {
                echo "<li>{$uc["comment"]}</li>";
            }
            echo "</ul>";
        }
        else {
            $this->renderEmptyInfoDiv();
        }
    }
    public function renderUsersMain(array $users) {
        echo "<main>";
            echo "<section class='header_section'>";
            echo "<h1>Användare</h1>";
            echo "</section>";
            echo "<section class='search_section'>";
                $this->createSearchField("users");
            echo "</section>";
            echo "<section class='create_btn_section'>";
                $this->renderCreateButton("user");
            echo "</section>";
            echo "<section class='main_content'>";
                if(count($users)>0) {
                    $this->renderAllUserAsClickableList($users);
                }
                else {
                    $this->renderCanNotFind();
                }
            echo "</section>";
        echo "</main>";
    }
    public function renderUserInfoMain (array $user, array $userComments,  int $id, array $completedBooksNum, array $completedPagesNum) {
        echo "<main class='details_section'>";
            echo "<section>";
                echo "<div>";
                    echo "<span>Förnamn:</span>";
                    echo "<span>{$user[0]->getFirstName()}</span>";
                echo "</div>";
                echo "<div>";
                    echo "<span>Efternamn:</span>";
                    echo "<span>{$user[0]->getLastName()}</span>";
                echo "</div>";
                echo "<div>";
                    echo "<span>Epost:</span>";
                    echo "<span>{$user[0]->getEmail()}</span>";
                echo "</div>";
                echo "<div>";
                    echo "<span>Mobil:</span>";
                    echo "<span>{$user[0]->getMobile()}</span>";
                echo "</div>";
                echo "<div class='buttons'>";
                    $this->renderDeleteButton($id);
                    $this->renderUpdateButton($id);
                echo "</div>";
            echo "</section>";
            echo "<section>";
                echo "<div>";
                    echo "<h2>Antal böcker har läst</h2>";
                    if($completedBooksNum!=null){
                        echo "<div>{$completedBooksNum[0]['completed_books']}</div>"; 
                    }
                    else {
                        $this->renderEmptyInfoDiv();
                    }
                echo "</div>";
                echo "<div>";
                    echo "<h2>Antal sidor har läst</h2>";
                    if($completedPagesNum!=null){
                        echo "<div>{$completedPagesNum[0]['completed_pages']}</div>";
                    }
                    else {
                        $this->renderEmptyInfoDiv();
                    }
                echo "</div>";
                echo "<div>";
                    echo $this->renderAllUserComments($userComments);
                echo "</div>";
            echo "</section>";
            echo "</main>";
        }
    public function renderUserFormMain () {
        echo "<main>";
        echo "<section class='header_section'>";
        echo "<h1>Lägg ny användare</h1>";
        echo "</section>";
        echo "<section class='create_form_section'>";
            $this->renderCreateUserForm();
        echo "</section>";
        echo "</main>";
    }
    public function renderUpdateUserFormMain (array $user) {
        echo "<main>";
        echo "<section class='header_section'>";
        echo "<h1>Uppdatera användare</h1>";
        echo "</section>";
        echo "<section class='create_form_section'>";
            $this->renderUpdateUserForm($user);
        echo "</section>";
        echo "</main>";
    }
    public function renderUpdateButton (int $id) {
        echo "<a href='?user-id={$id}&action=update'>Updatera info</a>";
    }
    public function renderUpdateUserForm (array $user) {
        echo "<form action='form-handlers/update-user-form-handler.php' method='POST'>";
        echo "<div>
                    <label for='user_id'>Användarens ID:</label>
                    <input value='{$user[0]->getId()}' type='text' id='user_id' name='user_id' readonly='readonly'>
                </div>
                <div>
                <label for='first_name'>Förnamn:</label>
                    <input value='{$user[0]->getFirstName()}' type='text' id='last_name' name='first_name'>
                </div>
                <div>
                <label for='last_name'>Efternamn:</label>
                    <input value='{$user[0]->getLastName()}' type='text' id='last_name' name='last_name'>
                </div>
                <div>
                <label for='email'>Epost:</label>
                <input value='{$user[0]->getEmail()}' type='email' id='email' name='email'>
                </div>
                <div>
                <label for='mobile'>Mobil:</label>
                    <input value='{$user[0]->getMobile()}' type='number' id='mobile' name='mobile'>
                </div>";
        echo "<button class='btn'>Uppdatera</button>";
        echo "</form>";
    }
    
}