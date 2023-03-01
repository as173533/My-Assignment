<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AddonCategory extends Model
{
    protected $fillable = ['name','addons','status'];
    protected $table = 'addon_categories';

    

    
}
