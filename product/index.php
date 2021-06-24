<?php
include_once 'src/Product.php';
include_once 'src/ProductManager.php';
ProductManager::$pathFile = 'data.json';
$result=ProductManager::load();
if (isset($_REQUEST['sort'])){
    if ($_REQUEST['sort']=='up'){
             $result = ProductManager::sort('up');
    } else {
        $result = ProductManager::sort('down');
    }
}
if(isset($_REQUEST['page'])){
    if ($_REQUEST['page'] == 'delete'){
        $id = $_REQUEST['id'];
        array_splice($result,$id,1);
        ProductManager::save($result);
        header("location:index.php");
    }
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

<table border="1px">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Price</th>
        <th></th>
        <th></th>
        <th><a href="view/student/add.php">add</a></th>
        <th><a href="index.php?sort=up"  >up</a></th>
        <th><a href="index.php?sort=down"  >down</a></th>
    </tr>
    <?php foreach ($result as $key => $product): ?>
        <tr>
            <td><?php echo $product->getId() ?></td>
            <td><?php echo $product->getName() ?></td>
            <td><?php echo $product->getPrice()?></td>
            <td><a href="index.php?page=delete&id=<?php echo $key ?>">Delete</a></td>
            <td><a href="view/student/edit.php?id=<?php echo $product->getId() ?>">Edit</a></td>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>

