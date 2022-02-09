<?php
$dbh = new PDO('mysql:host=localhost;dbname=shop_plants',
'root','');
$supp=$_GET['idsupprime'];
$query3 = $dbh->prepare('DELETE FROM `categories` WHERE id=?');

$query3->execute([$supp]);
$supprim = $query3->fetch();
header('Location:category.php');
exit;