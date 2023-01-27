<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function property(){

        return $this->belongsTo(Property::class);
    }

    public function bills(){
        return $this->hasMany(Bill::class);
    }

    public function payments(){
        return $this->hasMany(Payment::class);
    }

    public function leases(){
        return $this->hasMany(Lease::class);
    }

    public function workOrders(){
        return $this->hasMany(WorkOrder::class);
    }

}
