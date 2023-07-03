<?php

include "connect.inc.php";
include "classes.php";

if (empty($_POST['action'])) {
    $action = $_GET['action'];
    $id = $_GET['ID'];
} else {
    $action = $_POST['action'];
}

$usuario = new User($conn);
$evento = new Event($conn);

if ($action == 'insert') {
    $usuario->create($_POST);
    header('Location: login.php');
}

if ($action == 'login') {
    $usuario->check($_POST['email_login'], $_POST['senha_login']);
   header('Location: index.php');
}


if ($action == 'delete') {
    //$usuario->delete($id);
}
if ($action == 'cadastro-event') {
    $evento->create($_POST);
    header('Location: eventos-cad.php');
}

if ($action == 'pesquisar-event') {
    //$evento->readOne($_POST['pesq']);
    header('Location: pesquisar-event.php');
}

if ($action == 'edit-event') {
    $evento->update($_POST);
    header('Location: eventos-edit.php');
}



?>