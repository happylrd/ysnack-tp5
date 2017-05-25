<?php

namespace app\api\controller\v1;

use app\api\validate\Count;
use app\api\model\Product as ProductModel;
use app\api\validate\IDMustBePositiveInt;
use app\lib\exception\ProductException;

class Product
{
    /**
     * @url /product/recent?count=3
     */
    public function getRecent($count = 15)
    {
        (new Count())->goCheck();

        $products = ProductModel::listMostRecent($count);
        if ($products->isEmpty()) {
            throw new ProductException();
        }

        // hide `summary` field temporarily
        $products = $products->hidden(['summary']);

        return $products;
    }

    /**
     * @url /product/by_category?id=3
     */
    public function getAllInCategory($id)
    {
        (new IDMustBePositiveInt())->goCheck();

        $products = ProductModel::listByCategoryID($id);
        if ($products->isEmpty()) {
            throw new ProductException();
        }

        // hide `summary` field temporarily
        $products = $products->hidden(['summary']);

        return $products;
    }

    /**
     * @url /product/:id
     */
    public function getOne($id)
    {
        (new IDMustBePositiveInt())->goCheck();

        $product = ProductModel::getProductDetail($id);
        if (!$product) {
            throw new ProductException();
        }

        return $product;
    }
}