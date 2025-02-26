<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductPurchase extends Model
{
    protected $table = 'product_purchases';

    protected $fillable = [
        'invoice_number',
        'grand_total_amount',
        'paid_amount',
        'due_amount',
        'status',
        'purchase_details',
        'purchase_by',
        'purchase_date'
    ];
}
