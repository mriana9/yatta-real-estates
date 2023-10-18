<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class RealEstate extends Model
{
    protected $fillable = [
        'title',
        'description',
        'place',
        'space',
        'real_estate_type',
        'ad_type',
        'price',
        'image',
        'currency_id',
    ];
}
