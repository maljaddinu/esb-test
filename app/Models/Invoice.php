<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $primaryKey = 'invoice_id';
    use HasFactory;

    public function hasItem()
    {
        return $this->hasMany('App\Models\InvoiceItem','invoice_id','invoice_id');
    }

    public function hasDelivery()
    {
        return $this->hasOne('App\Models\DeliveryOrder','invoice_id','invoice_id');
    }
}
