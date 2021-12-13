<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';

    public function getThumbAssetPath() {
        return asset('thumb/' . $this->image_path);
    }
}
