<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PackagePrice extends Model
{
    protected $table = 'lv_package_price';
    protected $primaryKey = 'package_price_id';
    public $timestamps = true;
}
