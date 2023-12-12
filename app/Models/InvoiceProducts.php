<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceProducts extends Model
{
    use HasFactory;
    protected $fillable=['invoice_id', 'product_code','product_name','product_price' , 'product_quantity' , 'product_discount','product_subTotal'];

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }
}
