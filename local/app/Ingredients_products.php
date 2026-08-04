<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredients_products extends Model
{
    protected $table = 'products_ingredients';
    protected $primaryKey = 'products_ingredients_id';
}
