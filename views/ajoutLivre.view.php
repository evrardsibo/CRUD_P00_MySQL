<?php 
    ob_start() ?>
    <form method="POST" action="<?= URL ?>livres/av" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="title" class="form-label">Titre :</label>
        <input type="text" class="form-control" id="title" name="title">
    </div>
    <div class="mb-3">
        <label for="nbpages" class="form-label">Nombre de pages :</label>
        <input type="number" class="form-control" id="nbpages" name="nbpages">
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">Image :</label>
        <input type="file" class="form-control-file" id="image" name="image">
    </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <?php
    $content = ob_get_clean();
    $title = 'Ajouter Livres';
    require 'template.php';
    ?>