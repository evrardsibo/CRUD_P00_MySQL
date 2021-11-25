<?php 
    ob_start() ?>
    Ma page d'accueil 
    <?php
    $content = ob_get_clean();
    $title = 'Bibliotheque Sibomana';
    require 'template.php';
    ?>