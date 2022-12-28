<?php

$entity = new Src\Entity\Entity();

$domaine = $entity->app_info('app_domaine');

setcookie('acceptCookies', 1, time() + 17280000, '/', $domaine, false, true );

echo true;