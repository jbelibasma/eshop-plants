<?php
$dbh = new PDO('mysql:host=localhost;dbname=shop_plants',
'root','');



$query2 = $dbh->prepare(' SELECT `id`, `name`,count(`name`) as countname  FROM `authors` GROUP BY  `name`');
$query2->execute();
$authors=$query2->fetchAll();
// SELECT COUNT(`firstName`AND `lastName`) as name FROM `authors` GROUP BY `firstName`AND `lastName`  


$template= 'authors.phtml';
include '../client/layout.phtml';