<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryOrder extends Model
{
    use HasFactory;

    public function hasSender() {
        return $this->belongsTo(Address::class,'address_sender','address_id');
    }

    public function hasRecipient() {
        return $this->belongsTo(Address::class,'address_destination','address_id');
    }
}
