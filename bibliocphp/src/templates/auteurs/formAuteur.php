<?php

use lib\Database;
use repository\AuteurRepo;

$auteurRepo = new AuteurRepo();
$auteurRepo->database = new Database();

function createAuteur() {
    if(isset($_POST['createAuteur'])) {

        echo '<form method="post">
            <button type="submit" name="close" class="btn btn-danger icon-link">
                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ffffff}</style><path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"/></svg>
            </button>
        </form>
        <form method="post" class="mb-3">
            <div class="mb-3">
                <label for="firstnameCreate">Prénom</label>
                <input class="form-control" type="text" id="firstnameCreate" name="firstnameCreate" placeholder="Prénom">
            </div>
            <div class="mb-3">
                <label for="lastnameCreate">Nom</label>
                <input class="form-control" type="text" id="lastnameCreate" name="lastnameCreate" placeholder="Nom">
            </div>
            <button type="submit" class="btn btn-success">Ajouter un auteur</button>
        </form>';

    } else {

        echo '<form method="post" class="mb-3">
            <button type="submit" name="createAuteur" class="btn btn-success">Ajouter un auteur</button>
        </form>';

    }
}

if(isset($_POST['firstnameCreate']) && !empty($_POST['lastnameCreate'])) {

    $auteurRepo->create($_POST['firstnameCreate'], $_POST['lastnameCreate']);

}

function modifyAuteur($auteur) {
    if(isset($_POST['modifyAuteur' . $auteur->getId()])) {

        return '<form method="post">
            <button type="submit" name="close" class="btn btn-danger icon-link">
                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ffffff}</style><path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"/></svg>
            </button>
        </form>
        <form method="post" class="mb-3">
            <div class="mb-3">
                <label for="firstnameModify">Prénom</label>
                <input class="form-control" type="text" id="firstnameModify" name="firstnameModify" placeholder="Prénom" value="'.$auteur->getFirstname().'">
            </div>
            <div class="mb-3">
                <label for="lastnameModify">Nom</label>
                <input class="form-control" type="text" id="lastnameModify" name="lastnameModify" placeholder="Nom" value="'.$auteur->getLastname().'">
            </div>
            <input type="hidden" name="idModify" value="'.$auteur->getId().'">
            <button type="submit" class="btn btn-warning">Modifier</button>
        </form>';

    }

    return "";
}

if(isset($_POST['firstnameModify']) && !empty($_POST['lastnameModify']) && !empty($_POST['idModify'])) {

    $auteurRepo->modify($_POST['idModify'], $_POST['firstnameModify'], $_POST['lastnameModify']);

}

if(isset($_POST['delete'])) {

    $auteurRepo->delete(intval($_POST['delete']));

}

function filterAuteurFirstname() {
    echo '<form method="post">
            <input class="form-control" type="text" id="firstnameFilter" name="firstnameFilter" placeholder="Prénom filtré">
            <button type="submit" class="btn btn-warning">Filtrer</button>
        </form>';
}