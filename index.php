<?php

//alkalmaz�s gy�k�r k�nyvt�ra a szerveren
define('SERVER_ROOT', $_SERVER['DOCUMENT_ROOT'].'/tappancsjo/');

//URL c�m az alkalmaz�s gy�ker�hez
define('SITE_ROOT', 'http://localhost/tappancsjo/');

// a router.php vez�rl� bet�lt�se
require_once(SERVER_ROOT . 'controllers/' . 'router.php');

?>