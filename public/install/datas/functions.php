<?php

function randomPassword(int $longueur) {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = []; //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < $longueur; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}

function secureData(array $get = []): array
{
    foreach ($get AS $k => $v){
        $type[$k] = htmlspecialchars($v, ENT_QUOTES, 'UTF-8');
    }
    return $type;
}


function chechDatabase (){

}