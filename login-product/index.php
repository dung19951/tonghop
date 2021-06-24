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
    <input type="text" name="name">
    <input type="password"name="pass">
    <button name="si">sing in</button>
    <button name="su"> sing up</button>
</form>
</body>
</html>
<?php
if (isset($_REQUEST['si']))
{
    $name=$_REQUEST['name'];
    $pass=$_REQUEST['pass'];
    Data::login($name,$pass);

}
elseif (isset($_REQUEST['su']))
{
    header('location:sing-up.php');
}