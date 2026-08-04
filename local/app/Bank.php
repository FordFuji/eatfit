<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $table = 'tb_bank';
    protected $primaryKey = 'bank_id';
    public $timestamps = true;
}
