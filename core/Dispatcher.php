<?php
//dispatcher = recuperer l url et savoir quoi en faire

 class Dispatcher {
//
         var $request;  // se charge de tout récupérer au niveau de la requête, savoir ce qui a été fait
     function __construct(){ // fonction lancée automatiquement
         $this->request = new Request();
         Router::parse($this->request->url, $this->request);  // class global qui n'a pas besoin d'etre instancée, utilisable dans toute l'application
         $controller = $this->loadController();  //j'initialise mon controlleur pour charger le controller qui corresponds                            // on parse l url avec le ROUTER
         if(!in_array($this->request->action,get_class_methods($controller))){
             $this->error('le controller'.$this->request->controller.' n\a pas de methode'.$this->request->action);
         }
         call_user_func_array(array($controller,$this->request->action),$this->request->params); // fonction qui permet d'appeler une autre fonction, on appelle l'action en fonction du controller
         $controller->render($this->request->action);
     }

     function error($message){
         header("HTTP/1.0 404 not found");
         $controller = new Controller($this->request);
         $controller->set('message', $message);
         $controller->render('/errors/404');
         die();

     }
       function loadController() {
           $name = ucfirst($this->request->controller).'Controller'; // permets de stocker le nom quelques part
           $file = ROOT.DS.'controller'.DS.$name.'.php'; // on inclut le fichier là
           require $file;
           return new $name($this->request); // initialise PageController et on y injecte this->request
       }
 }
