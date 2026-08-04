<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $table = 'tb_about';
    protected $primaryKey = 'about_id';
    public $timestamps = true;
}
