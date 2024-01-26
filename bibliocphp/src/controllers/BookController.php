<?php
namespace src\controllers;

use src\models\Book;
use src\repositories\AuthorRepo;
use src\repositories\BookRepo;

class BookController {

    protected BookRepo $bookRepo;
    protected AuthorRepo $authorRepo;
    protected string $urlFilter;
    protected array $books;
    protected array $authors;
    protected Book $book;

    public function __construct() {
        $this->bookRepo = new BookRepo();
        $this->authorRepo = new AuthorRepo();
        $this->urlFilter = "";
        $this->books = $this->bookRepo->getAll();
        $this->authors = $this->authorRepo->getAll();
    }

    public function FormAction() {

        if(isset($_POST['action'])) {

            switch($_POST['action']) {

                case 'create':
                    if(isset($_POST['title']) && !empty($_POST['resume']) && !empty($_POST['author_id'])) {
    
                        $this->bookRepo->create($_POST['title'], $_POST['resume'], $_POST['author_id']);
                    
                    }
                    break;
                case 'modify':
                    if(isset($_POST['title']) && !empty($_POST['resume']) && !empty($_POST['author_id']) && !empty($_POST['id'])) {
    
                        $this->bookRepo->modify($_POST['id'], $_POST['title'], $_POST['resume'], $_POST['author_id']);
                    
                    }
                    break;
                case 'delete':
                    if(isset($_POST['delete'])) {

                        $this->bookRepo->delete(intval($_POST['delete']));
                    
                    }
                    break;
    
            }

        }

        if(isset($_GET['action'])) {

            switch($_GET['action']) {
                case 'filter':
                    if(isset($_GET['search'])) {
    
                        if($_GET['search'] != '') {
                    
                            $this->urlFilter = "/livres?action=filter&search=".$_GET['search'];
                            $this->books = $this->bookRepo->getAllContainsTitle($_GET['search']);
                    
                        } else {
                    
                            header("Location: /livres");
                    
                        }
                    
                    }
                    break;
            }

        }

    }

    public function ListBooks(BookController $bookController) {

        $urlFilter = $this->urlFilter;

        foreach ($this->books as $book) {

            $form = '';
            $my_array = array($book, $form, $bookController, $urlFilter);
            extract($my_array);
            include __DIR__ . '/../components/book/list.php';

        }

    }

    public function Infos() {

        if(isset($_GET['livre']) && !empty($_GET['livre'])) {

            $id = intval($_GET['livre']);
            
            if($id != 0) {

                $this->book = $this->bookRepo->get($id);
                $book = $this->book;
                $author = $this->authorRepo->get($book->getAuthor_id());
                $my_array = array($book, $author);
                extract($my_array);
                include __DIR__ . '/../components/book/infos.php';

            } else {

                header("Location: /livres");
                

            }

        } else {

            header("Location: /livres");

        }

    }

    public function FormCreateBook() {

        if(isset($_POST['formCreateBook'])) {

            $selectAuthors = "";
            foreach($this->authors as $author) {

                $selectAuthors .= '<option value="'.$author->getId().'">'.$author->getFirstname().' '.$author->getLastname().'</option>';

            }

            $my_array = array($selectAuthors);
            extract($my_array);
            include __DIR__ . '/../components/book/formCreate.php';

        } else {

            echo <<<'HTML'
                <form method="post" class="mb-3" action="/livres">
                    <button type="submit" name="formCreateBook" class="btn btn-success">Ajouter un livre</button>
                </form>
            HTML;

        }

    }

    public function FormModifyBook($book) {

        if(isset($_POST['formModifyBook' . $book->getId()])) {

            $selectAuthors = "";
            foreach($this->authors as $author) {

                if($author->getId() == $book->getAuthor_id()) {

                    $selectAuthors .= '<option value="'.$author->getId().'" selected>'.$author->getFirstname().' '.$author->getLastname().'</option>';

                } else {

                    $selectAuthors .= '<option value="'.$author->getId().'">'.$author->getFirstname().' '.$author->getLastname().'</option>';

                }

            }

            $my_array = array($book);
            extract($my_array);
            return include __DIR__ . '/../components/book/formModify.php';

        } else {

            return '';

        }

    }

    public function FormFilterBook() {

        return include __DIR__ . '/../components/book/filter.php';

    }

    public function Books(BookController $bookController) {

        $bookController->FormAction();
        $bookController->FormCreateBook();
        $bookController->FormFilterBook();
        $bookController->ListBooks($bookController);

    }

    public function Book(BookController $bookController) {

        $bookController->Infos();

    }

}