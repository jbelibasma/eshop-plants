<?php
session_start();     
$dbh = new PDO('mysql:host=localhost;dbname=shop_plants',
'root','');
$postsid = $_GET['idpostrecup'];
$query = $dbh->prepare('SELECT (`posts`.`id`) AS pid,`title`,`category-id`,`authors-id`,`content`,`posts`.`created-at`,`image`,`name`,`category` FROM `posts` INNER JOIN `authors` ON `posts`.`authors-id`= `authors`.`id` INNER JOIN `categories` ON
`categories`.`id`= `posts`.`category-id`');
$query->execute([$postsid]);
$posts = $query->fetch();

$query1 = $dbh->prepare('SELECT `pseudo`,`comment`,`postid`,`comments`.`created-at` FROM `comments` INNER JOIN `posts` ON `comments`.`postid`= `posts`.`id` WHERE `postid`=?');
$query1->execute([$postsid]);
$comments= $query1->fetchAll();


$template= 'details.phtml';
include 'layout.phtml';

