<?php
session_start();

$dbh = new PDO('mysql:host=localhost;dbname=shop_plants',
'root','');
// totla is null
$total=0;
$query2 = $dbh->prepare(' INSERT INTO `orders`(`user_id`, `total`, `created_at`) VALUES (?,NULL,now())');
$query2->execute([ $_SESSION['user_id']]);
// find last insert id of orders for use in orderline after
$orderId=$dbh->lastInsertId();

if(!empty($_POST)){
   

$query3 = $dbh->prepare(' INSERT INTO `orderlines`( `order_id`, `post_id`,`quantity`,`prix`) VALUES (?,?,?,?)');

foreach($_POST['carts'] as $value){
$query3->execute([$orderId,$value['id'],$value['quantity'],$value['prix']]);
$total+=$value['quantity']*$value['prix'];
// var_dump($total);exit();


}

}
$query4 = $dbh->prepare(' 
UPDATE `orders` SET `total`=? WHERE `orders`.id=?');
$query4->execute([$total,$orderId]);
echo $orderId;



