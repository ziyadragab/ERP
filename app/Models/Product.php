<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['item', 'par_code', 'item_code', 'description', 'price', 'unit', 'discount', 'tax', 'type', 'quantity'];
    
    public function invoices()
    {
        return $this->belongsToMany(Invoice::class)->withPivot('quantity', 'discount_percentage')->withTimestamps();
    }
}
