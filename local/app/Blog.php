<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'tb_blog';
    protected $primaryKey = 'blog_id';
    public $timestamps = true;
}
