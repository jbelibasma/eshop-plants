<?php
session_start();
$pdh= new PDO('mysql:host=localhost;dbname=shop_plants','root','');
$jquery=$pdh->prepare('SELECT * FROM `categories` ');
$jquery->execute();
$categorys=$jquery->fetchAll();
$jquery=$pdh->prepare('SELECT * FROM `authors` ');
$jquery->execute();
$authors=$jquery->fetchAll();

if(!empty($_POST)){
    
$jquery=$pdh->prepare('INSERT INTO `posts`( `category-id`,`authors-id`,`content`, `title`,price, `image`) 
VALUES (?,?,?,?,?,?)');
$target_dir = "../img/";
$name = time().$_FILES["file"]["name"];
 $target_file = $target_dir . $name;
 move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);

$jquery->execute([$_POST['category'],$_POST['authors'],$_POST['content'],$_POST['title'],$_POST['price'],$name]);

header('location:admin.php');
exit();
}
$template="addposts.phtml";
include "template.phtml";