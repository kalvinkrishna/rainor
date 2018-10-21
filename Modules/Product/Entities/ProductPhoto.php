<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Model;

class ProductPhoto extends Model
{
    protected $table = 'productphoto';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_product',
        'url'
    ];
    protected $dates = [
        'created_at',
        'updated_at'
    ];

    
}
