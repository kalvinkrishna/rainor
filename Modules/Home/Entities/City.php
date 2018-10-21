<?php

namespace Modules\Home\Entities;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = "Cities";
    protected $primaryKey = "id_city";
    protected $fillable = [];

}
