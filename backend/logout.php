<?php 
    session_start();
    unset($_SESSION['success']);
    header('location: ../../../../grove-apartment/login.php');
?>