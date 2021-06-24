<?php
include_once '../../src/Product.php';
include_once '../../src/ProductManager.php';

if ($_SERVER['REQUEST_METHOD']=='POST')
{
    $id=$_REQUEST['id'];
    $name=$_REQUEST['name'];
    $price=$_REQUEST['price'];
    $product=new Product($id,$name,$price);
    ProductManager::$pathFile='../../data.json';
    ProductManager::addProduct($product);
    ProductManager::sort();
        header('location:../../index.php');

}?>
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
    <input type="text" name="id">
    <input type="text" name="name">
    <input type="text" name="price">
    <button>add</button>
</form>
</body>
</html>
