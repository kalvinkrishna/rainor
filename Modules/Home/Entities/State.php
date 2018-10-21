<?php

namespace Modules\Home\Entities;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $table = "States";
    protected $primaryKey = "id_state";
    protected $fillable = [];
}
