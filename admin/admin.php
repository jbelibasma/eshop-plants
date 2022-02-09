<?php
session_start();
$bdh=new PDO('mysql:host=localhost;dbname=shop_plants','root','');
$query=$bdh->prepare('SELECT `id`,`category-id`,`authors-id`,`content`,`title`,`price`,`image`,`created-at` FROM `posts` ');
$query->execute();
$posts=$query->fetchAll();
$template="admin.phtml";
include "../client/layout.phtml";
