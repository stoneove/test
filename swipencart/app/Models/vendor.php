<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class vendor extends Authenticatable
{
    use HasFactory;
    protected $guard = 'vendor';
    protected $guarded = ['$confirm_password'];


    public function verify_token()
    {
        return $this->hasOne('App\Models\verify_token');
    }

}
