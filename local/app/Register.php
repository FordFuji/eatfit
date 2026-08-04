<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    protected $table = 'tb_register';
    protected $primaryKey = 'register_id';
    public $timestamps = true;
}
