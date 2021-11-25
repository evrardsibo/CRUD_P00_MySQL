    <?php 
    
    require_once('livreManager.class.php');
    

    
    $livreManager = new LivreManager();
    $livreManager->chargementLivres();
    ob_start() ?>
    <table class="table text-center">
        <tr class="table-primary">
            <th>Image</th>
            <th>Title</th>
            <th>Nombres de pages</th>
            <th colspan="2">Actions</th>
        </tr>
        
        <?php 
        $livres = $livreManager->getLivres();
        for($i=0;$i< count($livres);$i++) : ?>
        <tr>
            <td class="align-middle"><img src="public/img/<?= $livres[$i]->getImage()?>" width="60px" alt="php"></td>
            <td class="align-middle"><?= $livres[$i]->getTitle()?></td>
            <td class="align-middle"><?= $livres[$i]->getNbPages()?></td>
            <td class="align-middle"><a href="" class="btn btn-warning">Modifier</a></td>
            <td class="align-middle"><a href="" class="btn btn-danger">Supprimer</a></td>
        </tr>

        <?php endfor ?>
        
    </table>
    <a href="" class="btn btn-success d-block">Ajouter</a>
    <?php
    $content = ob_get_clean();
    $title = 'Livres Sibomana';
    require 'template.php';
    ?>