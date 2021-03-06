    <?php 
    ob_start();
        if(!empty($_SESSION['alert'])) :?>
        <div class="alert alert-<?= $_SESSION['alert']['type'] ?>" role="alert">
            <?= $_SESSION['alert']['msg'] ?>
        </div>
        <?php 
        unset($_SESSION['alert']);
        endif; 
        ?>

    <table class="table text-center">
        <tr class="table-primary">
            <th>Image</th>
            <th>Title</th>
            <th>Nombres de pages</th>
            <th colspan="2">Actions</th>
        </tr>
        
        <?php 
        for($i=0;$i< count($livres);$i++) : ?>
        <tr>
            <td class="align-middle"><img src="public/img/<?= $livres[$i]->getImage()?>" width="60px" alt="php"></td>
            <td class="align-middle"><a href="<?= URL ?>livres/l/<?=$livres[$i]->getId()?>"><?= $livres[$i]->getTitle()?></a></td>
            <td class="align-middle"><?= $livres[$i]->getNbPages()?></td>
            <td class="align-middle"><a href="<?= URL ?>livres/m/<?= $livres[$i]->getId(); ?>" class="btn btn-warning">Modifier</a></td>
            <td class="align-middle">
                <form method="POST" action="<?= URL ?>livres/s/<?= $livres[$i]->getId(); ?>" onSubmit="return confirm('Voulez vous supprime')">

                    <button class="btn btn-danger" type="submit">Supprime</button>
                </form>
            </td>
        </tr>

        <?php endfor ?>
        
    </table>
    <a href="<?= URL ?>livres/a" class="btn btn-success d-block">Ajouter</a>
    <?php
    $content = ob_get_clean();
    $title = 'Livres Sibomana';
    require 'template.php';
    ?>