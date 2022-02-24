<?php
session_start();
$dbh= new PDO('mysql:host=localhost;dbname=shop_plants','root','');
$query=$dbh->prepare('SELECT `id`,`title`,`category-id`,`authors-id`,`content`,`created-at`,`image`FROM `posts` ');
$query->execute();
$posts=$query->fetchAll();

$template= 'posts.phtml';
include '../client/layout.phtml';