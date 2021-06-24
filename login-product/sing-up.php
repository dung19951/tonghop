<?php
include_once 'src/Data.php';
include_once 'src/User.php';
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
    <input type="password"name="pa">
    <button name="sup">add</button>
</form>
</body>
</html>
<?php
if ($_SERVER['REQUEST_METHOD']=='POST')
{
    $name=$_REQUEST['na'];
    $pass=$_REQUEST['pa'];
    $user= new User($name,$pass);
    Data::addUser($user);
    header('location:index.php');
}