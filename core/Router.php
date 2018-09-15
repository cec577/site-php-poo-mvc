<?php
//router = cherche à parser l URL

class Router {

    // permets de parser une url. en @param je met l'url car il est à parser
    // j'indique le return avec un tableau également contenant les paramètres
    static function parse($url, $request){
        $url = trim($url,'/'); // on retire les slash en début et fin de caractère
        $params = explode('/',$url); // séparer les différents morceaux d'URL par des slashs
        $request->controller = $params[0]; // premier param = nom du controlleur
        $request->action = isset ($params[1]) ? $params[1] : 'index'; // on regarde si le 2eme paramètre est vide (dou le isset), si ça existe je met l'action là sinon je met l index    );
        $request->params = array_slice($params, 2); // on rajoute params si l url est plus longue
        return true; // on return comme ça le dispatcher peut récupérer les informations


    }

}
