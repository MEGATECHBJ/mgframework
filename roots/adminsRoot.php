<?php
$router->get('/a/login', "Admins#Login");
$router->post('/a/login', "Admins#Login");

$router->get('/a/dashboard', "Admins#Index");

$router->get('/a/admins', "Admins#Admins");
$router->get('/a/admins/create', "Admins#Admins#Create");
$router->post('/a/admins/create', "Admins#Admins#Create");
$router->get('/a/admins/:id/edit', "Admins#Admins#Edit");
$router->post('/a/admins/:id/edit', "Admins#Admins#Edit");
$router->get('/a/admins/:id/delete', "Admins#Admins#Delete");
$router->post('/a/admins/:id/delete', "Admins#Admins#Delete");

$router->get('/a/passwords', "Admins#Passwords");
$router->post('/a/passwords', "Admins#Passwords");

$router->get('/a/signout', "Admins#Signout");
