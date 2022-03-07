<?php
session_start();

$dbh = new PDO('mysql:host=localhost;dbname=shop_plants',
'root','');
if(!empty($_POST))
{
$query2 = $dbh->prepare('
UPDATE `categories` SET `category`=?  WHERE id=?');
$category=$_POST['category'];
$id=$_POST['id'];
$query2->execute([$category,$id]);
header('location:category.php');
exit();
}
$category=$_GET['idchang'];
$query = $dbh->prepare(' SELECT `id`,`category`,`created-at` FROM `categories` WHERE id=?');
$query->execute([$category]);
$category=$query->fetch();






$template= 'updatcateg.phtml';
include "template.phtml";