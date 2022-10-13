<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    private static $tva = 1.2;

    public function priceTtc() {
        $price_ttc = $this->price_ht * self::$tva;
        return number_format($price_ttc,2);
    }
}
