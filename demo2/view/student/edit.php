<?php
include_once '../../src/ProductManager.php';
include_once '../../src/Product.php';
if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
    ProductManager::$pathFile = '../../data.json';
    $product = ProductManager::getProductById($id);

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
    <input type="text" name="id"  value="<?php echo $product->getId()?>">
    <input type="text" name="name"  value="<?php echo $product->getName()?>">
    <input type="text"name="price"value="<?php echo $product->getPrice()?>">
    <button type="submit">Add</button>
</form>
</body>
</html>
<?php
include_once '../../src/ProductManager.php';
include_once '../../src/Product.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_REQUEST['id'];
    $name = $_REQUEST['name'];
    $price=$_REQUEST['price'];
    $product= new Product($id, $name,$price);
    ProductManager::editProductById($id,$product);
    header('location: ../../index.php');
}?>


