<?php 
    ob_start() 
    ?>
    <div class="row">
        <div class="col-6">
        <img src="<?= URL ?>public/img/<?= $livres->getImage(); ?>">
    </div>
    
        
        <div class="col-6">
            <p>Le titre du livre : <?= $livres->getTitle() ?></p>
            <p>Le nombre de page : <?= $livres->getNbPages() ?></p>
        </div>
    </div>
    <?php
    $content = ob_get_clean();
    $title = $livres->getTitle();
    require 'template.php';
    ?>