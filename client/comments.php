<?php

$dbh = new PDO('mysql:host=localhost;dbname=shop_plants',
'root','');

$query=$dbh->prepare('UPDATE `comments` SET `pseudo`=?,`comment`=?,`postid`=? 
');
$comments=$_POST['comments'];
$pseudo=$_POST['pseudo'];
$id=$_POST['postid'];
$query->execute([$comments,$pseudo,$id]);
// $query1 = $dbh->prepare('SELECT `pseudo`,`comment`,`postid`,`comments`.`created-at` FROM `comments` INNER JOIN `posts` ON `comments`.`postid`= `posts`.`id` WHERE `postid`=?');

// $query1->execute($_POST['id']);
// $comments= $query1->fetchAll();

 header('Location:details.php?idposts='.$id);
 exit;

