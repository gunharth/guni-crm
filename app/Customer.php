<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    // protected $fillable = [
    //     'name',
    //     'address_line_1',
    //     'address_line_2',
    //     'city',
    //     'postal_code',
    //     'state',
    //     'country'
    // ];

    public function domains()
    {
        return $this->hasMany(Domain::class);
    }
}
