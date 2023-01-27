<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function property(){

        return $this->belongsTo(Property::class);
    }

    public function category(){

        return $this->belongsTo(Category::class);
    }
}
