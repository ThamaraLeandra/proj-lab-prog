<?php

    //Não estou usandooo não funciona:(

    include "connect.inc.php";

    $email = $_POST['email_login']; 
    $senha = md5($_POST['senha_login']);
    $entrar = $_POST['entrar'];



    if (isset($entrar)) {

        $sql = ("SELECT * FROM users WHERE email =
        '$email' AND senha = '$senha'") or die("erro ao selecionar");
        if (mysql_num_rows($verifica)<=0){
            echo"<script language='javascript' type='text/javascript'>
            alert('Login e/ou senha incorretos');window.location
            .href='login.html';</script>";
            die();
        }else{
            setcookie("email",$email);
            header("Location:index.php");
        }
    }
?>