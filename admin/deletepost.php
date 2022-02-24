<?php
session_start();

$dbh = new PDO('mysql:host=localhost;dbname=shop_plants',
'root','');
$supp=$_GET['idsupp'];
$query3 = $dbh->prepare('DELETE FROM posts WHERE id=?');

$query3->execute([$supp]);
$supprim = $query3->fetch();
header('Location:admin.php');
exit;