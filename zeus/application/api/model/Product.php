<?php

namespace app\api\model;

class Product extends BaseModel
{
    protected $hidden = ['create_time', 'update_time', 'delete_time', 'pivot', 'from', 'category_id'];

    public function getMainImgUrlAttr($value, $data)
    {
        return $this->prefixImgUrl($value, $data);
    }

    public static function listMostRecent($count)
    {
        $products = self::limit($count)
            ->order('create_time desc')
            ->select();
        return $products;
    }

    public static function listByCategoryID($id)
    {
        $products = self::where('category_id', '=', $id)
            ->select();
        return $products;
    }
}