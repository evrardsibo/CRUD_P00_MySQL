<?php 
    ob_start() ?>
    <?= $msg ?> 
    <?php
    $content = ob_get_clean();
    $title = 'ERROR !!!!';
    require 'template.php';
    ?>