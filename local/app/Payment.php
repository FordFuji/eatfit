<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'tb_payment';
    protected $primaryKey = 'payment_id';
    public $timestamps = true;
}
