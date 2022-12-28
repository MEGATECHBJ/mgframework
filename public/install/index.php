<?php

require '../../src/Controller/Controller.php';
$controller = new Src\Controller\Controller();

session_start();
ini_set("display_errors", 1);
date_default_timezone_set('Africa/Porto-Novo');
define ('ROOT', dirname(__DIR__));
$config_file = ROOT.'/config/config.php';

$errors = [];

require 'datas/functions.php';

if(isset($_POST) && array_key_exists('db_config', $_POST)){
    if(isset($_POST) && $_POST['db_host'] != '' && $_POST['db_name'] != '' && $_POST['db_user'] != '' && $_POST['db_pass'] != '' && $_POST['db_prefix'] != ''){
        //Vérification de la presence de la base de données

        extract(secureData($_POST));
        $db_hosted = @mysqli_connect($db_host, $db_user, $db_pass);
        if($db_hosted){
            $db_named = @mysqli_select_db($db_hosted, $db_name);
            if($db_named){
                $_SESSION['config'] = $_POST;
                $_SESSION['step'] = 1;
            }
            else {
                $errors[] = "Base de données inexistante. Vérifier le nom et réessayer.";
            }
        }
        else {
            $errors[] = "Impossible de se connecter à la base de données. Veuillez vérifier les informations et réessayer";
        }
    }
    else {
        $errors[] = "Veuillez saisir toutes les informations liées à la base de données";
    }
}

if(isset($_POST) && array_key_exists('site_config', $_POST)){
    if(isset($_POST) && $_POST['app_url'] != '' && $_POST['app_name'] != '' && $_POST['app_slogan'] != ''
        && $_POST['company_name'] != '' && $_POST['company_email'] != '' && $_POST['company_first_phone'] != ''
        && $_POST['company_whatsapp'] != '' && $_POST['company_address'] != ''){
        secureData($_POST);

        $_SESSION['config'] = array_merge($_SESSION['config'], $_POST);
        $_SESSION['step'] = 2;
    }
    else {
        $errors[] = "Veuillez fournir toutes les informations obligatoires.";
    }
}

if(isset($_POST) && array_key_exists('site_info', $_POST)){
    if(isset($_POST) && $_POST['username'] != '' && $_POST['name'] != '' && $_POST['password'] != ''
        && $_POST['email'] != '' && $_POST['phone'] != '' && $_POST['admin'] != ''
        && $_POST['user'] != '' && $_POST['blog'] != ''){

        secureData($_POST);

        $_SESSION['config'] = array_merge($_SESSION['config'], $_POST);
        $_SESSION['step'] = 3;

        $config = ' 
    return [
        "db_host" => "'.$_SESSION['config']['db_host'].'",
        "db_user" => "'.$_SESSION['config']['db_user'].'",
        "db_pass" => "'.$_SESSION['config']['db_pass'].'",
        "db_name" => "'.$_SESSION['config']['db_name'].'",
        "db_prefix" => "'.$_SESSION['config']['db_prefix'].'",

        "app_url" => "'.$_SESSION['config']['app_url'].'",
        "app_domaine" => "'.$_SERVER['HTTP_HOST'].'",
        "app_name" => "'.$_SESSION['config']['app_name'].'",
        "app_slogan" => "'.$_SESSION['config']['app_slogan'].'",
        "app_description" => "'.$_SESSION['config']['app_description'].'",

        "company_name" => "'.$_SESSION['config']['company_name'].'",
        "company_email" => "'.$_SESSION['config']['company_email'].'",
        "company_whatsapp" => "'.$_SESSION['config']['company_whatsapp'].'",
        "company_first_phone" => "'.$_SESSION['config']['company_first_phone'].'",
        "company_second_phone" => "'.$_SESSION['config']['company_second_phone'].'",
        "" => "'.$_SESSION['config']['company_address'].'",
        "company_bp" => "'.$_SESSION['config']['company_bp'].'",

        "admin" => "'.$_SESSION['config']['admin'].'",
        "user" => "'.$_SESSION['config']['user'].'",
        "blog" => "'.$_SESSION['config']['blog'].'",
        "mode" => "dev", //prod
        "app_default_lang" => "fr",

        "currency" => "CFA",

        "app_youtube_url" => "",
        "app_facebook_url" => "",
        "app_twitter_url" => "",
        "app_instagram_url" => "",
        "app_flickr_url" => "",
        "app_telegram_url" => "",

        "upload_max_size" => 10495760,
        "upload_extension" => "picture", //picture | doc | all
        "upload_directory" => "uploads",

        /* API KEY */
        "fb_app_id" => "",
        "fb_app_secret" => "",
        "captcha_site_key" => "6Lfn2OQUAAAAAOegmRXRFoRjfLaTR46vERzg-21m",
        "captcha_secret_key" => "6Lfn2OQUAAAAANkFKdnJaCOGQGPgJo6SBbo3rS-P",

        /* SEO */
        "google_UA" => "",
        "yandex-code" => "",
        "bing-code" => "",
        "google-code" => "",

        /* CACHE */
        "cache_duration" => 0,
        "cache_duration_format" => "m", //s = Seconde, m = Minute, h = Heure

        /* FEDAPAY CODE */
        "fp_private_key" => "sk_sandbox_xeb7zZBJ89NspyfiOrgwLPPO",
        "fp_type" => "sandbox",
        
        /* KKYAPAY */
        "kkya_public_key" => "",
        "kkya_private_key" => "",
        "kkya_secret_key" => "",
    ];';

        file_put_contents('../../config/config.php', '<?php' );
        file_put_contents('../../config/config.php', $config, FILE_APPEND );

        //Creaton des tables de la base de données
        $admins_db = '
            CREATE TABLE IF NOT EXISTS `' . $_SESSION['config']['db_prefix'] . 'admins` (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `username` varchar(50) NOT NULL,
                `password` varchar(255) NOT NULL,
                `email` varchar(255) DEFAULT NULL,
                `name` varchar(255) DEFAULT NULL,
                `phone` varchar(45) DEFAULT NULL,
                `userright` int(11) DEFAULT NULL,
                `status` int(11) DEFAULT 0,
                `del` int(11) DEFAULT 0,
                `add_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
                PRIMARY KEY (id)
            ) ENGINE=MyISAM DEFAULT CHARSET=utf8;
        ';

        $password = password_hash(htmlspecialchars(trim($_POST['password'])), PASSWORD_BCRYPT);
        $admins_db2 = 'INSERT INTO `'. $_SESSION['config']['db_prefix'] . 'admins` (`username`, `password`, `email`, `name`, `phone`, `userright`, `status`, `del`, `add_date`) VALUES (\''.$_SESSION['config']['username'].'\', \''.$password.'\', \''.$_SESSION['config']['email'].'\', \''.$_SESSION['config']['name'].'\', \''.$_SESSION['config']['phone'].'\', 1, 1, 0, NOW())';

        $users_db = '
            CREATE TABLE IF NOT EXISTS `' . $_SESSION['config']['db_prefix'] . 'users` (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `email` varchar(255) DEFAULT NULL,
                `username` varchar(255) DEFAULT NULL,
                `phone` varchar(255) DEFAULT NULL,
                `password` varchar(255) DEFAULT NULL,
                `token` varchar(255) DEFAULT NULL,
                `uniqid` varchar(255) DEFAULT NULL,
                `status` tinyint(1) DEFAULT 0,
                `del` tinyint(1) DEFAULT 0,
                `userright` tinyint(2) DEFAULT 0,
                `add_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
                PRIMARY KEY (id)
            ) ENGINE=MyISAM DEFAULT CHARSET=utf8;
        ';

        $profils_db = '
            CREATE TABLE IF NOT EXISTS `'  . $_SESSION['config']['db_prefix'] .  'profils` (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `users_id` int(11) DEFAULT NULL,
                `name` varchar(255) DEFAULT NULL,
                `secondname` varchar(255) DEFAULT NULL,
                `email` varchar(255) DEFAULT NULL,
                `activate_date` timestamp NULL DEFAULT NULL,
                `status` int(11) DEFAULT 0,
                `del` int(11) DEFAULT 0,
                `add_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
                PRIMARY KEY (id)
            ) ENGINE=MyISAM DEFAULT CHARSET=utf8;
        ';

        $categories_db = '
            CREATE TABLE IF NOT EXISTS `' . $_SESSION['config']['db_prefix'] . 'posts_categories` (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `category` varchar(255) DEFAULT NULL,
                `slug` varchar(255) DEFAULT NULL,
                `status` int(11) DEFAULT 0,
                `del` int(11) DEFAULT 0,
                `add_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
                PRIMARY KEY (id)
            ) ENGINE=MyISAM DEFAULT CHARSET=utf8;
        ';

        $posts_db .= '
            CREATE TABLE IF NOT EXISTS `' . $_SESSION['config']['db_prefix'] . 'posts` (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `title` varchar(75) DEFAULT NULL,
                `category_id` int(11) NOT NULL,
                `image` varchar(255) DEFAULT NULL,
                `content` longtext,
                `slug` varchar(255) DEFAULT NULL,
                `status` int(11) NOT NULL DEFAULT \'1\',
                `featuring` int(11) NOT NULL DEFAULT 0,
                `see` int(11) NOT NULL DEFAULT 0,
                `del` int(11) NOT NULL DEFAULT 0,
                `add_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
                PRIMARY KEY (id)
            ) ENGINE=MyISAM DEFAULT CHARSET=utf8;
        ';

        $comments_db .= '
            CREATE TABLE IF NOT EXISTS `'  . $_SESSION['config']['db_prefix'] .  'posts_comments` (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `name` varchar(255) DEFAULT NULL,
                `email` varchar(255) DEFAULT NULL,
                `post_id` int(11) NOT NULL,
                `comment` text,
                `comment_id` int(11) DEFAULT NULL,
                `user_ip` varchar(255) DEFAULT NULL,
                `status` int(11) NOT NULL DEFAULT 0,
                `del` int(11) DEFAULT 0,
                `add_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
                PRIMARY KEY (id)
            ) ENGINE=MyISAM DEFAULT CHARSET=utf8;
        ';

        $newsletters_db .= '
            CREATE TABLE IF NOT EXISTS `'  . $_SESSION['config']['db_prefix'] .  'posts_newsletters` (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `email` varchar(255) DEFAULT NULL,
                `phone` varchar(255) DEFAULT NULL,
                `ip` varchar(255) DEFAULT NULL,
                `status` int(11) DEFAULT 0,
                `del` int(11) DEFAULT 0,
                `add_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
                PRIMARY KEY (id)
            ) ENGINE=MyISAM DEFAULT CHARSET=utf8;            
        ';

        $db = @mysqli_connect($_SESSION['config']['db_host'], $_SESSION['config']['db_user'], $_SESSION['config']['db_pass'], $_SESSION['config']['db_name']);


        if ($_POST['admin'] == 'true') {
            mysqli_query($db, $admins_db);
            mysqli_query($db, $admins_db2);
        }

        if ($_POST['user'] == 'true') {
            mysqli_query($db, $users_db);
            mysqli_query($db, $profils_db);
        }

        if ($_POST['blog'] == 'true') {
            mysqli_query($db, $posts_db);
            mysqli_query($db, $categories_db);
            mysqli_query($db, $newsletters_db);
            mysqli_query($db, $comments_db);
        }

        $controller->alertDefine('Base de données configurée avec succès.', 'success');
        $controller->redirection($_SESSION['config']['app_url']);
    }
    else {
        $errors[] = "Veuillez fournir toutes les informations obligatoires.";
    }

}

if(!isset($_SESSION['step']) || $_SESSION['step'] == 0){
    include 'views/index0.php';
}
elseif(isset($_SESSION['step']) && $_SESSION['step'] == 1){
    include 'views/index1.php';
}
elseif(isset($_SESSION['step']) && $_SESSION['step'] == 2){
    include 'views/index2.php';
}
die();

