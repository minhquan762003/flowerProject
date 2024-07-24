<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use App\Models\Flower;
class RegionTableSedder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $customerIds = Flower::pluck('id')->toArray();
        $faker = Faker::create();

        
        for($i = 0; $i <10; $i++){
            DB::table('regions')->insert([
                'flower_id' =>$faker->randomElement($customerIds),
                'region_name' => $faker->sentence(),
                'created_at' =>$faker->dateTime($max = 'now', $timezone = null),
                'updated_at' =>$faker->dateTime($max = 'now', $timezone = null),
            ]);


        }
    }
}
