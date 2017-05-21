<?php

namespace app\api\controller\v2;

class Banner
{
    /**
     * @url /banner/:id
     */
    public function getBanner($id)
    {
        return 'This is v2 version';
    }
}