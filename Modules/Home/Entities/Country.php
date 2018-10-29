<?php

namespace Modules\Home\Entities;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = "Countries";
    protected $primaryKey = "id_country";

    protected $fillable = ['name','phone_code'];

  
}
