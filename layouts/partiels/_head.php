<?php
ob_start();
header('Content-Type: text/html; charset=UTF-8');
setlocale(LC_ALL, 'fr_FR');
setlocale(LC_ALL, 'fra');
?>
<!DOCTYPE html>
<?php if (isset($_SESSION['lang']) && $_SESSION['lang'] != "") { $language = $_SESSION['lang']; } else { $language =  $this->entity()->app_info('app_default_lang') ; } ?>
<html lang="<?= $language ?>" xml:lang="<?= $language ?>">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="Description" content="<?php if (isset($description) && $description != "") { echo $description;} else { echo $this->entity()->app_info('app_description') ; } ?>">
    <meta name="Indentifier-URL" content="<?= $this->entity()->url(); ?>">
    <meta name="Copyright" content="&copy; <?= date('Y'); ?> <?= strtoupper($this->entity()->app_info('app_name')); ?>">
    <meta name="Robots" content="All">
    <meta name="Revisit-after" content="10">
    <?php if($this->entity()->app_info('yandex-code') != ''): ?>
        <meta name="yandex-verification" content="<?= $this->entity()->app_info('yandex-code'); ?>" />
    <?php endif; ?>
    <?php if($this->entity()->app_info('bing-code') != ''): ?>
        <meta name="msvalidate.01" content="<?= $this->entity()->app_info('bing-code'); ?>" />
    <?php endif; ?>
    <?php if($this->entity()->app_info('google-code') != ''): ?>
        <meta name="google-site-verification" content="<?= $this->entity()->app_info('google-code'); ?>" />
    <?php endif; ?>


    <?php if (method_exists($this, 'header')) {
        echo $this->header();
    } ?>

    <!-- Google / Search Engine Tags-->
    <meta itemprop="name" content="<?= $this->entity()->app_info('app_name'); ?>">
    <meta itemprop="description" content="<?php if (isset($description) && $description != "") { echo $description;} else { echo $this->entity()->app_info('app_description') ; } ?>">
    <meta itemprop="image" content="<?php if (isset($og_picture) && $og_picture != "") { echo $og_picture;} else { echo $this->entity()->get_file("vendor",'logo.png'); } ?>">

    <!-- Twitter Meta Tags-->
    <meta name="twitter:card"          content="summary_large_image">
    <meta name="twitter:title"         content="<?php if (isset($page_titre) && $page_titre != "") { echo $page_titre;} else { echo $this->entity()->app_info('app_slogan') ; } ?>">
    <meta name="twitter:description"   content="<?php if (isset($description) && $description != "") { echo $description;} else { echo $this->entity()->app_info('app_description') ; } ?>">
    <meta name="twitter:image"         content="<?php if (isset($og_picture) && $og_picture != "") { echo $og_picture;} else { echo $this->entity()->get_file("vendor",'logo.png'); } ?>">
    <meta name="twitter:url"           content="<?= $this->entity()->url().$_SERVER['REQUEST_URI']; ?>">
    <meta name="twitter:site"          content="@eidaconsulting" />
    <meta name="twitter:creator"       content="@eidaconsulting" />

    <!-- Facebook Meta Tags-->
    <meta property="og:locale"         content="<?php if (isset($_SESSION['lang']) && $_SESSION['lang'] == "en") { echo "en_EN";} else { echo 'fr_FR'; } ?>" />
    <meta property="og:url"            content="<?= $this->entity()->url().$_SERVER['REQUEST_URI']; ?>" />
    <meta property="og:type"           content="<?php if (isset($og_type) && $og_type != "") { echo $og_type;} else { echo 'website'; } ?>" />
    <meta property="og:title"          content="<?php if (isset($page_titre) && $page_titre != "") { echo $page_titre;} else { echo $this->entity()->app_info('app_slogan') ; } ?>" />
    <meta property="og:description"    content="<?php if (isset($description) && $description != "") { echo $description;} else { echo $this->entity()->app_info('app_description') ; } ?>" />
    <meta property="og:image"          content="<?php if (isset($og_picture) && $og_picture != "") { echo $og_picture;} else { echo $this->entity()->get_file("vendor",'logo.png'); } ?>" />

    <title><?php if (isset($page_titre) && $page_titre != "") { echo $page_titre;} else { echo $this->entity()->app_info('app_slogan') ; } ?> :: <?= $this->entity()->app_info('app_name'); ?></title>

    <!-- Favicons -->
    <link href="<?= $this->entity()->get_file("vendor",'favicon.png'); ?>" rel="icon" type="image/png">
    <link href="<?= $this->entity()->get_file("vendor",'favicon.ico'); ?>" rel="shortcut icon">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <?php if (method_exists($this, 'css')) {
        echo $this->css();
    } ?>

    <link rel="preload" href="https://fonts.googleapis.com/css?family=Dosis:400,700|Open+Sans:400,400i,700,700i|Poppins:400,400i,700,700i|Quintessential|Roboto:400,400i,700,700i" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript> <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Dosis:400,700|Open+Sans:400,400i,700,700i|Poppins:400,400i,700,700i|Quintessential|Roboto:400,400i,700,700i"> </noscript>

    <link rel="preload" href="<?= $this->entity()->get_file("vendor",'animate/animate.css'); ?>" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript> <link rel="stylesheet" href="<?= $this->entity()->get_file("vendor",'animate/animate.css'); ?>"> </noscript>

    <link rel="stylesheet" href="<?= $this->entity()->get_file("vendor",'bootstrap/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?= $this->entity()->get_file("css",'style.css'); ?>">

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

</head>