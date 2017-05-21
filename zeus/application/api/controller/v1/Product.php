<?php

namespace app\api\controller\v1;

use app\api\validate\Count;
use app\api\model\Product as ProductModel;
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
}