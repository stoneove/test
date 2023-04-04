<?php

namespace Database\Factories;
use App\Models\Section;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\section>
 */
class sectionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $sections = [
            ['id'=>1,'name'=>'Colthes','status'=>1],
            ['id'=>2,'name'=>'Electronics','status'=>1],
            ['id'=>3,'name'=>'Appliances','status'=>1],
        ];
        foreach($sections as $section){
            Section::create($section);
        }
    }
}
