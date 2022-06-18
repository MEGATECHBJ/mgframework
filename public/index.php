<?php
ini_set("display_errors", 1);
date_default_timezone_set('Africa/Porto-Novo');
define ('ROOT', dirname(__DIR__));
require ROOT . '/vendor/autoload.php';

$entity = new \Core\Entity\Entity();
$config_file = ROOT.'/config/config.php';

if(session_status() === PHP_SESSION_NONE){
    session_start();
}



if(!file_exists($config_file)){
    session_destroy();
    header('Location: ../install/index.php');
}

if(!isset($_GET['url'])) {
    $_GET['url'] = null;
}

$router = new \Core\Router\Router($_GET['url']);

$router->get('/', 'Publics#index');
$router->get('/404', 'Publics#notfound');
$router->get('/contacts', 'Publics#contacts');
$router->post('/contacts', 'Publics#contacts');

$router->get('/about', 'Publics#about');
$router->post('/about', 'Publics#about');

include $entity->mega_include(ROOT."/roots/adminsRoot");
include $entity->mega_include(ROOT."/roots/usersRoot");
include $entity->mega_include(ROOT."/roots/blogRoot");
//include '../modules/Paiements/Root/paiementsRoot.php';

$router->run();