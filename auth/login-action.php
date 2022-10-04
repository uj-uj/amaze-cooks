<?php
namespace Phppot;

use \Phppot\Member;
if (! empty($_POST["login"])) {
    session_start();
    $username = filter_var($_POST["user_name"], FILTER_SANITIZE_STRING);
    $password = filter_var($_POST["password"], FILTER_SANITIZE_STRING);
    require_once (__DIR__ . "./member.php");
    echo("username".$username.$password);
    $member = new Member();
    $isLoggedIn = $member->processLogin($username, $password);
    echo("username".$_SESSION["user_name"]);
    // exit();
    if (! $isLoggedIn) {
        $_SESSION["errorMessage"] = "Invalid Credentials";
        header("Location: /amaze-cooks1/auth/login.php");
        exit();
    }
    header("Location: /amaze-cooks1/index.php");
    exit();
}
?>