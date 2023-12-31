<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'address_1',
        'address_2',
        'town',
        'country',
        'post_code',
        'phone',
        'name_ship',
        'address_1_ship',
        'address_2_ship',
        'town_ship',
        'county_ship',
        'post_code_ship',
        'phone_ship',
    ];

    public function invoices(){
       return $this->hasMany(Invoice::class);
    }
}
