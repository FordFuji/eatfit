<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'tb_order';
    protected $primaryKey = 'order_id';
    public $timestamps = true;
}
