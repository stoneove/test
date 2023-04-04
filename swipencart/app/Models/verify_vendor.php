<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class verify_vendor extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function vendor()
    {
        return $this->belongsTo('App\Models\vendor');
    }
}
