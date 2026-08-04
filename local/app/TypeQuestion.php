<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeQuestion extends Model
{
    protected $table = 'tb_type_question';
    protected $primaryKey = 'type_question_id';
    public $timestamps = true;
}
