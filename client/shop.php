<?php
session_start();     
$dbh = new PDO('mysql:host=localhost;dbname=shop_plants',
'root','');
$query = $dbh->prepare('SELECT (`posts`.`id`) AS pid,`title`,`category-id`,`authors-id`,SUBSTRING(`content`, 1,50) as descript,`posts`.`created-at`,`name`,`image`,`category` FROM `posts` INNER JOIN `authors` ON `posts`.`authors-id`= `authors`.`id` INNER JOIN `categories` ON
`categories`.`id`= `posts`.`category-id` ');
$query->execute();
$posts = $query->fetchAll();
$query=$dbh->prepare('SELECT `id`,`category` FROM `categories`');
$query->execute();
$categories=$query->fetchAll();






$template= 'shop.phtml';
include 'layout.phtml';
