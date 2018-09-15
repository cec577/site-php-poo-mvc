<?php
// l'objet request = se charge de tout récupérer au niveau de la requête, savoir ce qui a été fait

 class Request {

 // on crée notre première variable pour savoir quelle URL a été appelée par l'users :
 public $url;

     function __construct(){ // fonction lancée automatiquement
         $this->url = $_SERVER['PATH_INFO']; // url tapée par l'utilisateur
     }
 }
