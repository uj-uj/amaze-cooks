<?php
session_start();
$_SESSION["user_name"] = "";
session_destroy();

header("Location: login.php");
?>