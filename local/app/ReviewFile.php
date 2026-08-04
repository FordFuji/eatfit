<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReviewFile extends Model
{
    protected $table = 'tb_review_file';
    protected $primaryKey = 'review_file_id';
    public $timestamps = true;
}
