<?php
$dbh=new PDO('mysql:host=localhost;dbname=shop_plants','root','');
if(empty($_POST)){
    $template = "login.phtml";
    include "layout.phtml";
}
else
{
    if(isset($_POST['email']) && isset($_POST['password'])){
        $query=$dbh->prepare('SELECT * FROM `users` WHERE `email`=?');
        $query->execute([$_POST['email']]);
        $user=$query->fetch();
        if(!empty($user)){
            $pswd=$_POST['password'];
            
            if(password_verify($pswd,$user['password'])==false)
            {
                $message='password incorrect';
                $template = "login.phtml";
                include "layout.phtml";
            
            }
            session_start();     
            $_SESSION['user_id']=$user['id'];     
            $_SESSION['email']=$user['email'];     
            $_SESSION['password']=$user['password'];     
            $_SESSION['roles']=$user['roles'];     
             
            if($_SESSION['roles']==1){
                header('location:../admin/admin.php');
            }
            elseif($_SESSION['roles']==0){
                header('location:index.php');
            }
        }
        else{
            $message='email incorrect';
            $template = "login.phtml";
            include "layout.phtml";

        }
    }
}
