<?php

namespace app\api\model;

class Category extends BaseModel
{
    protected $hidden = ['update_time', 'delete_time'];

    public function img()
    {
        return $this->belongsTo('Image', 'topic_img_id', 'id');
    }
}