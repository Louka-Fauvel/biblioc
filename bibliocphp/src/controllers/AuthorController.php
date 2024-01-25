<?php
namespace src\controllers;

use src\repositories\AuthorRepo;

class AuthorController {

    protected AuthorRepo $authorRepo;
    protected string $urlFilter;
    protected array $authors;

    public function __construct() {
        $this->authorRepo = new AuthorRepo;
        $this->urlFilter = "";
        $this->authors = $this->authorRepo->getAll();
    }

    public function FormAction() {

        if(isset($_POST['action'])) {

            switch($_POST['action']) {

                case 'create':
                    if(isset($_POST['firstname']) && !empty($_POST['lastname'])) {
    
                        $this->authorRepo->create($_POST['firstname'], $_POST['lastname']);
                    
                    }
                    break;
                case 'modify':
                    if(isset($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['id'])) {
    
                        $this->authorRepo->modify($_POST['id'], $_POST['firstname'], $_POST['lastname']);
                    
                    }
                    break;
                case 'delete':
                    if(isset($_POST['delete'])) {

                        $this->authorRepo->delete(intval($_POST['delete']));
                    
                    }
                    break;
    
            }

        }

        if(isset($_GET['action'])) {

            switch($_GET['action']) {
                case 'filter':
                    if(isset($_GET['search'])) {
    
                        if($_GET['search'] != '') {
                    
                            $this->urlFilter = "/auteurs?action=filter&search=".$_GET['search'];
                            $this->authors = $this->authorRepo->getAllContainsFirstname($_GET['search']);
                    
                        } else {
                    
                            header("Location: /auteurs");
                    
                        }
                    
                    }
                    break;
            }

        }

    }

    public function ListAuthors(AuthorController $authorController) {

        $urlFilter = $this->urlFilter;

        foreach ($this->authors as $author) {

            $form = '';
            $my_array = array($author, $form, $authorController, $urlFilter);
            extract($my_array);
            include __DIR__ . '/../components/author/list.php';

        }

    }

    public function FormCreateAuthor() {

        if(isset($_POST['formCreateAuthor'])) {

            include __DIR__ . '/../components/author/formCreate.php';

        } else {

            echo '<form method="post" class="mb-3" action="/auteurs">
                <button type="submit" name="formCreateAuthor" class="btn btn-success">Ajouter un auteur</button>
            </form>';

        }

    }

    public function FormModifyAuthor($author) {

        if(isset($_POST['formModifyAuthor' . $author->getId()])) {

            $my_array = array($author);
            extract($my_array);
            return include __DIR__ . '/../components/author/formModify.php';

        } else {

            return '';

        }

    }

    public function FormFilterAuthor() {

        return include __DIR__ . '/../components/author/filter.php';

    }

    public function Authors(AuthorController $authorController) {

        $authorController->FormAction();
        $authorController->FormCreateAuthor();
        $authorController->FormFilterAuthor();
        $authorController->ListAuthors($authorController);

    }

}