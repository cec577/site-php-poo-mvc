<?php

 class Controller {

     public $request;
     private $vars = array();
     public $layout = 'default';
     private $rendered = false;

     function __construct($request){ // initalise
         $this->request = $request;

     }
// fonction permettant de rentre une vue
     public function render($view){
         if($this->rendered){ return false; }
         extract($this->vars);
         if(strpos($view,'/')===0){
             $view = ROOT.DS.'view'.$view.'.php';
         }else{
             $view = ROOT.DS.'view'.DS.$this->request->controller.DS.$view.'.php';


         }
         ob_start(); // contenu qui ne s affiche pas mais qui se stocke
         require($view); // on va chercher la vue
         $content_for_layout = ob_get_clean(); // on récupère le $content_for_layout
         require ROOT.DS.'view'.DS.'layout'.DS.$this->layout.'.php';
         $this->rendered = true;
     }

     public function set($key,$value=null){
         if(is_array($key)){
             $this->vars += $key;
         }
             else{
            $this->vars[$key] = $value;
             }
         }
 }
