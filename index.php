<?php 
    require_once 'livre.class.php';
    ob_start() ?>

    $livre = new Livre;
    
 

    Ma page d'accueil 
    <?php
    $content = ob_get_clean();
    $title = 'Bibliotheque Sibo';
    require 'template.php';
    ?>
   

