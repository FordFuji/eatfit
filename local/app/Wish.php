<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wish extends Model
{
    protected $table = 'tb_wish';
    protected $primaryKey = 'wish_id';
    public $timestamps = true;
}
