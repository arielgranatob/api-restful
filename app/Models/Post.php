<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Post extends Eloquent
{

    protected $table = 'posts';
    protected $fillable = [
        'title',
        'description',
        'by'
    ];
}
