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
        
    }

}