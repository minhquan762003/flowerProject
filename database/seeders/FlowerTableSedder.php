<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
class FlowerTableSedder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        
        for($i = 0; $i <10; $i++){
            DB::table('flowers')->insert([
                'Name' =>$faker->name(),
                'description' => $faker->sentence(),
                'image_url'=>$faker->sentence(),
                'created_at' =>$faker->dateTime($max = 'now', $timezone = null),
                'updated_at' =>$faker->dateTime($max = 'now', $timezone = null),
            ]);


        }
    }
}
