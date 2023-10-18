<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\RealestatesType;
use App\Models\AdType;
use App\Models\Currency;

class RealEstate extends Model
{ 
    public function realEstateType() {
        return $this->belongsTo(RealestatesType::class, 'type_id');
    }

    public function realEstateAdType() {
        return $this->belongsTo(AdType::class, 'ad_id');
    }

    public function realEstateCurrency() {
        return $this->belongsTo(Currency::class, 'currency_id');
    }

    public function realEstateUser() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
