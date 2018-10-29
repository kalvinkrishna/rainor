<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Model;

class SubCategories extends Model
{
    protected $table = "categories_relation";
    protected $primaryKey = "id";
    protected $fillable = [];

    public function categories(){
    
    }


}
