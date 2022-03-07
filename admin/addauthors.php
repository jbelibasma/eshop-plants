<?php
session_start();
$dbh = new PDO('mysql:host=localhost;dbname=shop_plants',
'root','');
if(!empty($_POST)){
$authors = $dbh->prepare('INSERT INTO `authors`(`id`, `name`) VALUES (?,?)
');
$authors->execute([$_POST['id'],$_POST['author']]);
header('location:authors.php');
exit();
}

$category = $dbh->prepare('SELECT `id`,`name`FROM `authors`  ');
$category->execute();
$categorys=$category->fetchAll();

$template= "addauthors.phtml";
include "template.phtml";