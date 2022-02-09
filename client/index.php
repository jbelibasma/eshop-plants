<?php
session_start();     
$dbh = new PDO('mysql:host=localhost;dbname=shop_plants',
'root','');
$query = $dbh->prepare('SELECT (`posts`.`id`) AS pid,`title`,`category-id`,`authors-id`,SUBSTRING(`content`, 1,50) as descript,`posts`.`created-at`,`image`,`price`,`name`,`category` FROM `posts` INNER JOIN `authors` ON `posts`.`authors-id`= `authors`.`id` INNER JOIN `categories` ON
`categories`.`id`= `posts`.`category-id` ORDER BY `created-at` LIMIT 3');
$query->execute();
$posts = $query->fetchAll();
// $query = $dbh->prepare('SELECT * FROM `posts` ORDER BY `created-at` LIMIT 3');
// $query->execute();
// $posts = $query->fetchAll();





$template= 'index.phtml';
include 'layout.phtml';
