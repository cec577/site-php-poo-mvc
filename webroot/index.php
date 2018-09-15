<?php
 // on définit quelques constantes, utilisables dans toute l'application et réutilisable
 // dirname = permet de récuperer le dossier d'un chemin et file est une constante de php
 // qui contient l'URL du fichier

 define('WEBROOT', dirname(__FILE__)); // webroot eest le dossier parrent de file. $SERVER pour voir
 define('ROOT', dirname(WEBROOT));
 define('DS', DIRECTORY_SEPARATOR);
 define('CORE',ROOT. DS.'core');
 define('BASE_URL',dirname(dirname($_SERVER['SCRIPT_NAME']))); // racine de mon site

 // on crée ensuite le dispatcher

// je vais récupérer mon fichier pour tous les require
require CORE.DS.'includes.php'; // interet des constantes = récupérer des fichiers rapidos
new Dispatcher(); // je peux utiliser ici mon Dispatcher
?>
