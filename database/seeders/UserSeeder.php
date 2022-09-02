<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker= Factory::create();

        for($i=0; $i< 5000; $i++){
            $data[] = [
                'name' => $faker->name,
                'email' => $faker->unique()->email,
                'password'=> Hash::make('12345678'),
            ];
        }
        
        $chunks = array_chunk($data, 500);
        foreach($chunks as $chunk){
            User::insert($chunk);
        }
    }
}
