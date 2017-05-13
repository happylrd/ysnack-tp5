<?php

namespace app\api\model;

use think\Db;
use think\Model;

class Banner extends Model
{
    public static function getBannerByID($id)
    {
//        $result = Db::query(
//            'select * from banner_item where banner_id=?', [$id]);
//        return $result;

        $result = Db::table('banner_item')
            ->where('banner_id', '=', $id)
            ->select();

//        $result = Db::table('banner_item')
//            ->where(function ($query) use ($id) {
//                $query->where('banner_id', '=', $id);
//            })
//            ->select();
        return $result;
    }
}