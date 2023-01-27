<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkOrder extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function property(){

        return $this->belongsTo(Property::class);
    }

    public function tenant(){

        return $this->belongsTo(Tenant::class);
    }
}
