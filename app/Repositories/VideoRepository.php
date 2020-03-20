<?php
/**
 * Created by PhpStorm.
 * User: jrivera
 * Date: 24/8/17
 * Time: 17:09
 */

namespace App\Repositories;


use App\Entities\Video;

class VideoRepository
{
    public function getVideoAll()
    {
        return Video::all();
    }

}