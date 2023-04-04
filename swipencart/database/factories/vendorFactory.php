<?php

namespace Database\Factories;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\vendor>
 */
class vendorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id'=>1,'name'=>'swipen','address'=>'gujranwala','country'=>'Pakistan','city'=>'gujranwala','pincode'=>'345345','state'=>'gujranwala','mobile'=>'03054564668','email'=>'swipencart.co@gmail.com','password'=>Hash::make('123'),'status'=>1
            ];

    }
}
