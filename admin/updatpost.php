<?php
session_start();
$dbh = new PDO('mysql:host=localhost;dbname=shop_plants',
'root','');
if((empty($_FILES)) && (!empty($_POST))){
    $query2 = $dbh->prepare('
    UPDATE `posts` SET `category-id`=?,`authors-id`=?,`content`=?,`title`=?,`image`=?,`price`=? WHERE `id`=?');
    $category=$_POST['category'];
    $author=$_POST['authors'];
    $content=$_POST['addarticle'];
    $titl=$_POST['title'];
    $target_dir = "../img/";
    $name = time().$_FILES["file"]["name"];
    $target_file = $target_dir . $name;
    $price=$_POST['price'];
    $id=$_POST['id'];
    $query2->execute([$category,$author,$content,$titl,$name,$price,$id]);
}
else if(!empty($_POST))
{
$query2 = $dbh->prepare('
UPDATE `posts` SET `category-id`=?,`authors-id`=?,`content`=?,`title`=?,`image`=?,`price`=? WHERE `id`=?');
$category=$_POST['category'];
$author=$_POST['authors'];
$content=$_POST['addarticle'];
$titl=$_POST['title'];
$target_dir = "../img/";
$name = time().$_FILES["file"]["name"];
 $target_file = $target_dir . $name;
 move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
$price=$_POST['price'];
$id=$_POST['id'];

$query2->execute([$category,$author,$content,$titl,$name,$price,$id]);

header('location:admin.php');
exit();
}



$idchang=$_GET['idmodiff'];
$query2 = $dbh->prepare('SELECT `id`, `category-id`, `authors-id`, `content`, `title`, `image`, `price`, `created-at` FROM `posts` WHERE id=?');
$query2->execute([$idchang]);
$post=$query2->fetch();
$query = $dbh->prepare('
SELECT * FROM `categories` ');

$query->execute();
$categorys = $query->fetchAll();
$query = $dbh->prepare('
SELECT * FROM `authors`  ');

$query->execute();
$authors = $query->fetchAll();

$template="updatpost.phtml";
include "template.phtml";