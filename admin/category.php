<?php
session_start();

$dbh = new PDO('mysql:host=localhost;dbname=shop_plants',
'root','');



$query2 = $dbh->prepare(' SELECT `id`,COUNT(`category`) as count,`category`,`created-at` FROM `categories` GROUP BY `category` ');
$query2->execute();
$categories=$query2->fetchAll();


$template= 'category.phtml';
include "template.phtml";
