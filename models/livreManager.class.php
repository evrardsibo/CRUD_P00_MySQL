<?php

  require_once('model.class.php');
  require_once('livre.class.php');

    class LivreManager extends Model
    {
        private $livres; // tableaux des livres

        public function ajoutLivres($livres)
        {
            $this->livres[] = $livres;
        }

        public function getLivres()
        {
            return $this->livres;
        }

        public function chargementLivres()
        {
            $req = $this->getBdd()->prepare("SELECT * FROM livres ORDER BY id DESC");
            $req->execute();
            $livres = $req->fetchAll(PDO::FETCH_ASSOC); // tableau associatif
            $req->closeCursor();
            // echo '<pre>';
            // var_dump($livres);
            // echo '</pre>';

            //creer un objet
            foreach($livres as $livre)
            {
                $li = new Livre($livre['id'],$livre['image'],$livre['title'],$livre['nbpages']);
                $this->ajoutLivres($li);
            }
            

        }

        public function getLivreById($id)
        {
            for($i=0;$i < count($this->livres);$i++)
            {
                if($this->livres[$i]->getId()=== $id)
                {
                    return $this->livres[$i];
                }
            }
        }
    }