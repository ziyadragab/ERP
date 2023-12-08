<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice',
        'invoice_date',
        'invoice_due_date',
        'subtotal',
        'shipping',
        'discount',
        'vat',
        'total',
        'notes',
        'invoice_type',
        'status',
        'par_code',
        'customer_id',
        'product_id', 
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}
