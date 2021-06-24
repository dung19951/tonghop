<?php
include_once 'src/Data.php';
include_once 'src/User.php';
session_start();
Data::$path='data.json';
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
    <input type="text"name="na">
    <p><?php if (isset($_SESSION['name'])){
        echo $_SESSION['name'];session_destroy();
        }?></p>
    <input type="password"name="pa">
    <p><?php if (isset($_SESSION['pass'])){
            echo $_SESSION['pass'];session_destroy();
        }?></p>
    <button name="sup">add</button>
</form>
</body>
</html>
<?php
if ($_SERVER['REQUEST_METHOD']=='POST')
{
    $name=$_REQUEST['na'];
    $pass=$_REQUEST['pa'];
   Data::check($name,$pass);

}