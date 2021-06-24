<?php


class ProductManager
{
    public static $pathFile;

    public static function save($data)
    {
        $dataJson = json_encode($data);
        file_put_contents(self::$pathFile, $dataJson);
    }

    public static function load()
    {
        $dataJson = file_get_contents(self::$pathFile);
        $data = json_decode($dataJson);
        return self::covertToProduct($data);
    }

    public static function covertToProduct($data)
    {
        $products = [];
        foreach ($data as $item) {
            $product = new Product($item->id, $item->name,$item->price);
            array_push($products,$product);
        }
        return $products;
    }

    public static function addProduct($product)
    {
        $products = self::load();
        array_push($products, $product);
        self::save($products);
    }

    public static function getProductById($id)
    {
        $products= self::load();
        foreach ($products as $product) {
            if ($product->getId() == $id) {
                return $product;
            }
        }
    }

    public static function editProductById($id, $newProduct)
    {
        $products = self::load();
        foreach ($products as $product) {
            if ($product->getId() == $id) {
               $product->setName($newProduct->getName());
               $product->setPrice($newProduct->getPrice());
            }
        }
        self::save($products);
    }

 public static function sort($type)
    {
        $arr=self::load();
        usort($arr,function ($item1,$item2) use ($type){
          if ($type=='up'){
              return $item1->price > $item2->price;
          }
          else{
              return $item1->price < $item2->price;
          }
        });
        return $arr;
}
}