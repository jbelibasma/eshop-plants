<?php
session_start();     

$dbh = new PDO('mysql:host=localhost;dbname=shop_plants',
'root','');
$query=$dbh->prepare('INSERT INTO `comments`(`pseudo`, `comment`, `post-id`, `created-at`) VALUES (?,?,?,now())');

$pseudo=$_POST['pseudo'];
$comments=$_POST['comment'];
$id=$_POST['id'];
$query->execute([$pseudo,$comments,$id]);
// $query1 = $dbh->prepare('SELECT `pseudo`,`comment`,`postid`,`comments`.`created-at` FROM `comments` INNER JOIN `posts` ON `comments`.`postid`= `posts`.`id` WHERE `postid`=?');

// $query1->execute($_POST['id']);
// $comments= $query1->fetchAll();

 header('Location:details.php?idpostrecup='.$id);
 exit;

