<?php
session_start();
$dbh = new PDO('mysql:host=localhost;dbname=shop_plants',
'root','');
if(!empty($_POST) )
{
$query2 = $dbh->prepare('
UPDATE `authors` SET `name`=? WHERE `id`= ?');
$author=$_POST['author'];
$id=$_POST['id'];
$query2->execute([$author,$id]);
header('location:authors.php');
exit();

}
$authors=$_GET['idupdat'];
$query = $dbh->prepare(' SELECT  `name` ,`id`  FROM `authors` WHERE id=?');
$query->execute([$authors]);
$authorlist=$query->fetch();






$template= 'updatauthors.phtml';
include '../client/layout.phtml';