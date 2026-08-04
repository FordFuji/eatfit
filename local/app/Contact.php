<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'tb_contact_form';
    protected $primaryKey = 'contact_form_id';
    public $timestamps = true;
}
