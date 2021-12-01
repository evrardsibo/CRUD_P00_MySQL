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

            throw new Exception('Petit Malin');
        }

        public function ajoutLivresBd($title,$nbpages,$image)
        {
            $req = "INSERT INTO livres (title,nbpages,image)
                    VALUES(:title, :nbpages, :image)";
            $stmt = $this->getBdd()->prepare($req);
            $stmt->bindValue(':title',$title,PDO::PARAM_STR);
            $stmt->bindValue(':nbpages',$nbpages,PDO::PARAM_INT);
            $stmt->bindValue(':image',$image,PDO::PARAM_STR);
            $result = $stmt->execute();
            $stmt->closeCursor;

             if($result>0)
             {
                 $livres = new Livre($this->getBdd()->lastInsertId(),$image,$title,$nbpages);
                 $this->ajoutLivres($livres);
             }

        }

        public function suppressionLivreBd($id)
        {
            $req = "DELETE FROM livres WHERE id = :idLivre";
            $stmt = $this->getBdd()->prepare($req);
            $stmt->bindValue(':idLivre',$id,PDO::PARAM_INT);
            $result = $stmt->execute();
            $stmt->closeCursor();

            if (($result > 0 )) {
               $livre = $this->getLivreById($id);
               unset($livre);
            }
        }

        public function modificationLivreBd($id,$title,$nbpages,$image)
        {
            $req = "UPDATE livres SET title = :title, nbpages = :nbpages, image = :image WHERE id = :id";
            $stmt = $this->getBdd()->prepare($req);
            $stmt->bindValue(':id',$id,PDO::PARAM_INT);
            $stmt->bindValue(':title',$title,PDO::PARAM_STR);
            $stmt->bindValue(':nbpages',$nbpages,PDO::PARAM_INT);
            $stmt->bindValue(':image',$image,PDO::PARAM_STR);
            $result = $stmt->execute();
            $stmt->closeCursor;

            if ($result >0) {
                $this->getLivreById($id)->setTitle($title);
                $this->getLivreById($id)->setTitle($nbpages);
                $this->getLivreById($id)->setTitle($image);
            }
        }
    }