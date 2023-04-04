<?php

namespace Database\Factories;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\admin>
 */
class adminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
        'id'=>1,'name'=>'SuperAdmin','type'=>'Super Admin','mobile'=>'03054564668','email'=>'swipencart.co@gmail.com','password'=>Hash::make('123'),'image'=>'','status'=>1
        ];
    }
}
