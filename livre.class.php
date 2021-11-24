<?php
     
     class Livre
     {
         private $id;
         private $image;
         private $nbpages;
         private $title;

         public function __construct($id, $image, $title, $nbpages)
         {
             $this->id = $id;
             $this->image = $image;
             $this->title = $title;
             $this->nbpages = $nbpages;
         }

         public function getId(){return $this->id;}
         public function setId($id){$this->id = $id;}

         public function getImage(){return $this->image;}
         public function setImage($image){$this->image = $image;}

         public function getTitle(){return $this->title;}
         public function setTitle($title){return $this->title = $title;}

         public function getNbPages(){return $this->nbpages;}
         public function setNbPages($nbpages){return $this->nbpages = $nbpages;}


     }