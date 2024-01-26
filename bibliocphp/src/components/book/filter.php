<form method="get" action="/livres">

    <input type="hidden" name="action" value="filter">
    
    <div class="mb-3">
        <input class="form-control" type="text" id="search" name="search" placeholder="Titre du livre filtré">
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-warning">Filtrer</button>
    </div>

</form>