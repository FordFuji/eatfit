<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'tb_question';
    protected $primaryKey = 'question_id';
    public $timestamps = true;
}
