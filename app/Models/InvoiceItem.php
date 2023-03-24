<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceItem extends Model
{
    use HasFactory;

    public function getService()
    {
        return $this->belongsTo('App\Models\Service','service_id','service_id');
    }
}
