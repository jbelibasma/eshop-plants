<?php
session_start();
$dbh = new PDO('mysql:host=localhost;dbname=shop_plants',
'root','');
$query2 = $dbh->prepare(' SELECT `nom`,`quantity`,(`posts`.`prix`) as price,`total` FROM `orderlines`  
INNER JOIN `posts` ON `posts`.`id`=`orderlines`.`post_id` 
INNER JOIN `orders` on `orders`.`id`=`orderlines`.`order_id` WHERE `order_id` =? ');
$query2->execute([$_GET['new_sale']]);
$affichOrder=$query2->fetchAll();


include "checkout.phtml";