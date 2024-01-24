<form method="post">

    <div class="mb-3">
        <button type="submit" name="close" class="btn btn-danger icon-link">
            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ffffff}</style><path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"/></svg>
        </button>
    </div>

</form>

<form method="post" class="mb-3">

    <input type="hidden" name="action" value="modify">

    <div class="mb-3">
        <label for="firstname">Prénom</label>
        <input class="form-control" type="text" id="firstname" name="firstname" placeholder="Prénom" value="<?php echo $author->getFirstname() ?>">
    </div>

    <div class="mb-3">
        <label for="lastname">Nom</label>
        <input class="form-control" type="text" id="lastname" name="lastname" placeholder="Nom" value="<?php echo $author->getLastname() ?>">
    </div>

    <input type="hidden" name="id" value="<?php echo $author->getId() ?>">
    <div class="mb-3">
        <button type="submit" class="btn btn-warning">Modifier</button>
    </div>

</form>