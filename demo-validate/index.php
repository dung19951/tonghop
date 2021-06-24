<?php
include_once 'User.php';
include_once 'Validate.php';
session_start();
if ($_SERVER['REQUEST_METHOD']=='POST')
{
    $name=$_REQUEST['$name'];
    $pass=$_REQUEST['pass'];
    $email=$_REQUEST['email'];
    Validate::chekName($name);
    Validate::checkMail($email);
    Validate::chekPass($pass);
}


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form method="post">
    <input type="text"name="$name"placeholder="nhap ten">
    <p><?php if (isset($_SESSION['username']))  {echo $_SESSION['username'];session_destroy();} ?></p>
    <input type="text" placeholder="nhap email"name="email">
    <p><?php if (isset($_SESSION['username']))  {echo $_SESSION['email'];session_destroy();}?></p>
    <input type="password" name="pass"placeholder="nhap pass">
    <p><?php if (isset($_SESSION['username']))  {echo $_SESSION['pass'];session_destroy();}?></p>
    <button>sing up</button>

</form>
</body>
</html>
