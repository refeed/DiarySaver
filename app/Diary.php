<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diary extends Model
{
    protected $table = 'diaries';

    public static $createRules = [
        'content' => 'required',
    ];

    public function getImagePath() {
        $images =  $this->hasOne('App\Image', 'diary_id', 'id')->get();
        if (count($images) > 0) {
            return asset('images/' . $images[0]->image_path);
        }
        return null;
    }

}
