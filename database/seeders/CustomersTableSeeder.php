<?php

namespace Database\Seeders;

use App\Helpers\GeneralHelper;
use App\Models\Customers;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        foreach(range(1,10) as $index) {
            $gender = $faker->randomElement(['m', 'f']);
            $customer = new Customers();
            $customer->name = $faker->name;
            $customer->cpf = GeneralHelper::randomCpf();
            $customer->gender = $gender;
            $customer->birthdate = $faker->date;
            $customer->address_street = $faker->address;
            $customer->city = $faker->city;
            $customer->state = $faker->citySuffix;
            $customer->save();
        }
    }
}
