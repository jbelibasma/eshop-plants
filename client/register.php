<?php
session_start();
$dbh = new PDO('mysql:host=localhost;dbname=shop_plants',
'root','');
if(empty($_POST)){
    $template = "register.phtml";
    include "layout.phtml";
}
else{
        $query=$dbh->prepare('SELECT `email` FROM `users` WHERE `email`=?');
        $query->execute([$_POST['email']]);
        $user= $query->fetch();
        if(!empty($user)){
            $message= "email exist !";
            $template = "register.phtml";
            include "layout.phtml";        
        }
        $pasword =password_hash($_POST['password'],PASSWORD_DEFAULT);
        $register=$dbh->prepare('INSERT INTO `users`(`LastName`,`FirstName`, `email`, `password`) 
        VALUES (?,?,?,?)');
        $register->execute([$_POST['lastName'],$_POST['firstName'],$_POST['email'],$pasword]);


        header('location:index.php');
}

