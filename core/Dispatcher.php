<?php
//dispatcher = recuperer l url et savoir quoi en faire

class Dispatcher {

        var $request;  // se charge de tout récupérer au niveau de la requête, savoir ce qui a été fait
    function __construct(){ // fonction lancée automatiquement
        $this->request = new Request();
        Router::parse($this->request->url, $this->request);  // class global qui n'a pas besoin d'etre instancée, utilisable dans toute l'application
        print_r($this->request);
    }                                        // on parse l url avec le ROUTER
}
