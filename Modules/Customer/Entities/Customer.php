<?php

namespace Modules\Customer\Entities;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customer';
    protected $fillable = [
        'customer_name',
        'customer_email',
        'customer_address',
        'province',
        'kabupaten',
        'kelurahan'
    ];
}
