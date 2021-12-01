<?php

    session_start();
    define("URL", str_replace("index.php","",(isset($_SERVER['HTTPS']) ? "https" : "http").
    "://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));

    require('controllers/LivreController.controller.php');
    $livreController = new LivresControlles;


    try
    {

        if(empty($_GET['page']))
        {
            require('views/accueil.view.php');
            
        }else
        {
           
            $url = explode("/", filter_var($_GET['page']),FILTER_SANITIZE_URL);
            // echo '<pre>';
            // var_dump($url);
            // echo '</pre>';
            switch($url[0])
            {
                case "accueil" : require('views/accueil.view.php');
                break;
                case "livres" :
                    if (empty($url[1])) {
                        $livreController->afficheLivres();
                    }elseif($url[1]==='l'){

                         $livreController->afficheLivre($url[2]);

                    }elseif($url[1]==='a'){

                        $livreController->ajoutLivre();

                    }elseif($url[1]==='m'){

                        $livreController->modificationLivre($url[2]);

                    }elseif($url[1]==='s'){

                        $livreController->suppressionLivre($url[2]);

                    }elseif($url[1]==='av'){

                        $livreController->ajoutLivreValidation();

                    }elseif($url[1]==='mv'){

                        $livreController->modificationlivreValidation();

                    }
                    else {
                        throw new Exception(' page 404');
                    }
                break;
                default : throw new Exception(' page 404');
            }
        }
       
    }catch(Exception $e){
        $msg = $e->getMessage();
        require 'views/error.view.php';
    }

