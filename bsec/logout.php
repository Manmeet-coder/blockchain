<?php
session_start();
unset($_SESSION["login_user"]);
unset($_SESSION["usertype"]);
unset($_SESSION['status']);
header("Location:index.php");
?>