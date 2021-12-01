<?php
require_once('models/livreManager.class.php');
class LivresControlles
{
    private $livreManager;

    public function __construct()
    {
        
        $this->livreManager = new LivreManager();
        $this->livreManager->chargementLivres();
    }

    public function afficheLivres()
    {
        $livres = $this->livreManager->getLivres();
        require('views/livres.view.php');
    }

    public function afficheLivre($id)
    {
        $livres = $this->livreManager->getLivreById($id);
        require 'views/affiche.view.php';
    }

    public function ajoutLivre()
    {
        require('views/ajoutLivre.view.php');
    }

    public function ajoutLivreValidation()
    {
        $file = $_FILES['image'];
        $repertoire = 'public/img/';
        $nomImageAjoute = $this->ajoutImage($file,$repertoire);
        $this->livreManager->ajoutLivresBd($_POST['title'],$_POST['nbpages'],$nomImageAjoute);
        $_SESSION['alert'] = [

            'type' => 'success',
            'msg' => 'ajout effectué'
        ];
        header('location:'.URL. 'livres');
        // echo '<pre>';
        // print_r($file);
        // echo '</pre>';   
    }

    private function ajoutImage($file, $dir){
        if(!isset($file['name']) || empty($file['name']))
            throw new Exception("Vous devez indiquer une image");
    
        if(!file_exists($dir)) mkdir($dir,0777);
    
        $extension = strtolower(pathinfo($file['name'],PATHINFO_EXTENSION));
        $random = rand(0,99999);
        $target_file = $dir.$random."_".$file['name'];
        
        if(!getimagesize($file["tmp_name"]))
            throw new Exception("Le fichier n'est pas une image");
        if($extension !== "jpg" && $extension !== "jpeg" && $extension !== "png" && $extension !== "gif")
            throw new Exception("L'extension du fichier n'est pas reconnu");
        if(file_exists($target_file))
            throw new Exception("Le fichier existe déjà");
        if($file['size'] > 500000)
            throw new Exception("Le fichier est trop gros");
        if(!move_uploaded_file($file['tmp_name'], $target_file))
            throw new Exception("l'ajout de l'image n'a pas fonctionné");
        else return ($random."_".$file['name']);
    }

    public function suppressionLivre($id)
    {
        $nomImage = $this->livreManager->getLivreById($id)->getImage();
        unlink("public/img/.$nomImage");
        $this->livreManager->suppressionLivreBd($id);
        $_SESSION['alert'] = [

            'type' => 'success',
            'msg' => 'Livre supprime'
        ];
        header('location:'.URL. 'livres');

    }

    public function modificationLivre($id)
    {
        $livre = $this->livreManager->getLivreById($id);
        require "views/modifierLivre.view.php";
    }

    public function modificationlivreValidation()
    {
        $imageActuelle = $this->livreManager->getLivreById($_POST['identinfiant'])->getImage();
        $file = $_FILES['image'];

        if($file > 0)
        {
            unlink("public/img/.$imageActuelle");
            $repertoire = 'public/img/';
            $nomImageToAdd = $this->ajoutImage($file,$repertoire);
        }else {
            $nomImageToAdd = $imageActuelle ;
        }
        $this->livreManager->modificationLivreBd($_POST['identinfiant'],$_POST['title'],$_POST['nbpages'],$nomImageToAdd);
        $_SESSION['alert'] = [

            'type' => 'success',
            'msg' => 'modification effectué'
        ];
        header('location:'.URL. 'livres');
    }

}