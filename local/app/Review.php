<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'tb_review';
    protected $primaryKey = 'review_id';
    public $timestamps = true;
}
