<?php
session_start();

if(isset($_POST['logout_btn']))
{
  session_destroy();
  unset($_SESSION['username']);
  //$_SESSION = array();
  header('Location: /fyp/login/index.php');
}
?>