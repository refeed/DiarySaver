<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diary extends Model
{
    protected $table = 'diaries';

    public static $createRules = [
        'content' => 'required',
    ];

}
