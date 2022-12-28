<?php
ini_set("display_errors", 1);
date_default_timezone_set('Africa/Porto-Novo');
define ('ROOT', dirname(__DIR__));
require ROOT . '/vendor/autoload.php';
$entity = new \Src\Entity\Entity();
$config_file = ROOT.'/config/config.php';


if(session_status() === PHP_SESSION_NONE){
    session_start();
}

if(!isset($_GET['url'])) {
    $_GET['url'] = null;
}

$router = new \Src\Router\Router($_GET['url']);

if(!file_exists($config_file)){
    session_destroy();
    header('Location: ../install/index.php');
}

$router->get('/', 'Publics#index', 'publics.index');
$router->get('/404', 'Publics#notfound');
$router->get('/databases/create', 'Publics#databases');
$router->get('/contacts', 'Publics#contacts', 'publics.contacts');
$router->post('/contacts', 'Publics#contacts');
$router->get('/contacter', function () use ($router) {echo $router->url('Publics#databases'); });

//Exemple avec paramettre
$router->get('/ma-page/:id/:slug', 'Publics#notfound')
    ->with('id', '[0-9]+')
    ->with('slug', '[a-z0-9\-]+');

include $entity->mega_include(ROOT."/roots/adminsRoot");
include $entity->mega_include(ROOT."/roots/usersRoot");
include $entity->mega_include(ROOT."/roots/blogRoot");
//include '../modules/Paiements/Root/paiementsRoot.php';

$router->run();