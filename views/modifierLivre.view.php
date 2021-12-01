<?php 
    ob_start() ?>

<form method="POST" action="<?= URL ?>livres/mv" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="title" class="form-label">Titre :</label>
        <input type="text" class="form-control" id="title" name="title" value="<?= $livre->getTitle(); ?>">
    </div>
    <div class="mb-3">
        <label for="nbpages" class="form-label">Nombre de pages :</label>
        <input type="number" class="form-control" id="nbpages" name="nbpages" value="<?= $livre->getNbPages(); ?>" >
    </div>
    <div class="mb-3">
        <h3>Image</h3>
        <img src="<?= URL ?>public/img/<?= $livre->getImage() ; ?>" alt="">
        <label for="image" class="form-label"> Changer Image :</label>
        <input type="file" class="form-control-file" id="image" name="image">
    </div>
    <input type="hidden" name="identinfiant" value="<?= $livre->getId() ; ?>">
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    
    <?php
    $content = ob_get_clean();
    $title = 'Modifier Livre :'.$livre->getId();
    require 'template.php';
    ?>