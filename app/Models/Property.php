<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function tenants(){
        return $this->hasMany(Tenant::class);
    }
    public function workOrders(){
        return $this->hasMany(WorkOrder::class);
    }

    public function tasks(){
        return $this->hasMany(Task::class);
    }

    public function services(){
        return $this->hasMany(Service::class);
    }

    public function memo(){
        return $this->hasMany(Memo::class);
    }
}
