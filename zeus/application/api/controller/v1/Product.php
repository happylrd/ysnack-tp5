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

        $products = ProductModel::getMostRecent($count);
        if (!$products) {
            throw new ProductException();
        }

        // hide `summary` field temporarily
        $collection = collection($products);
        $products = $collection->hidden(['summary']);

        return $products;
    }
}