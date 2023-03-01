<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name','price','photo', 'addon_categories',  'status'];

    protected $table = 'products';

      

}
