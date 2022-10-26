<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderLine extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'document_number',
        'item_id',
        'quantity',
        'price',
        'total_price',
    ];
}