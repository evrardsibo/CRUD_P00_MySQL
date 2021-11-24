    <?php ob_start() ?>
    <table class="table text-center">
        <tr class="table-primary">
            <th>Image</th>
            <th>Title</th>
            <th>Nombres de pages</th>
            <th colspan="2">Actions</th>
        </tr>
        <tr>
            <td class="align-middle"><img src="public/img/PHP-8.jpg" width="60px" alt="php"></td>
            <td class="align-middle">PHP</td>
            <td class="align-middle">300</td>
            <td class="align-middle"><a href="" class="btn btn-warning">Modifier</a></td>
            <td class="align-middle"><a href="" class="btn btn-danger">Supprimer</a></td>
        </tr>
        <tr>
            <td class="align-middle"><img src="public/img/poo.jpg" width="60px" alt="php"></td>
            <td class="align-middle">POO</td>
            <td class="align-middle">400</td>
            <td class="align-middle"><a href="" class="btn btn-warning">Modifier</a></td>
            <td class="align-middle"><a href="" class="btn btn-danger">Supprimer</a></td>
        </tr>
        <tr>
            <td class="align-middle"><img src="public/img/laravel.jpg" width="60px" alt="php"></td>
            <td class="align-middle">Laravel</td>
            <td class="align-middle">500</td>
            <td class="align-middle"><a href="" class="btn btn-warning">Modifier</a></td>
            <td class="align-middle"><a href="" class="btn btn-danger">Supprimer</a></td>
        </tr>
        <tr>
            <td class="align-middle"><img src="public/img/mysql.jpg" width="60px" alt="php"></td>
            <td class="align-middle">Mysql</td>
            <td class="align-middle">600</td>
            <td class="align-middle"><a href="" class="btn btn-warning">Modifier</a></td>
            <td class="align-middle"><a href="" class="btn btn-danger">Supprimer</a></td>
        </tr>
        <tr>
            <td class="align-middle"><img src="public/img/php.jpg" width="60px" alt="php"></td>
            <td class="align-middle">CRUD</td>
            <td class="align-middle">400</td>
            <td class="align-middle"><a href="" class="btn btn-warning">Modifier</a></td>
            <td class="align-middle"><a href="" class="btn btn-danger">Supprimer</a></td>
        </tr>
    </table>
    <a href="" class="btn btn-success d-block">Ajouter</a>
    <?php
    $content = ob_get_clean();
    $title = 'Livres Sibo';
    require 'template.php';
    ?>