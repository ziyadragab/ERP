<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'date',
        'due_date',
        'subtotal',
        'shipping',
        'discount',
        'vat',
        'total',
        'notes',
        'type',
        'status',
        'par_code',
        'customer_id',

    ];

    public function products()
    {
        return $this->hasMany(InvoiceProducts::class);
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}
