<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orderdetail extends Model
{
    protected $table = 'tb_order_detail';
    protected $primaryKey = 'order_detail_id';
    public $timestamps = true;
}
