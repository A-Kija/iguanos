<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Bebras',
            'email' => 'bebras@gmail.com',
            'password' => Hash::make('123'),
            'role' => 'user',
        ]);

        DB::table('users')->insert([
            'name' => 'Briedis',
            'email' => 'briedis@gmail.com',
            'password' => Hash::make('123'),
            'role' => 'admin',
        ]);

        DB::table('users')->insert([
            'name' => 'Barsukas',
            'email' => 'barsukas@gmail.com',
            'password' => Hash::make('123'),
            'role' => 'manager',
        ]);

        $faker = Faker::create();

        foreach (range(1, 40) as $index) {
            DB::table('clients')->insert([
                'client_name' => $faker->company(),
                'client_address' => $faker->address(),
                'client_address2' => rand(0, 2) ? null : $faker->secondaryAddress(),
                'client_vat' => rand(0, 2) ? null : $faker->numberBetween(100000000, 999999999),
                'client_country' => $faker->countryCode(),
            ]);
        }

        $products = 122;

        foreach (range(1, $products) as $index) {
            $price = $faker->numberBetween(1, 10000) / 100;
            DB::table('products')->insert([
                'name' =>  
                (rand(0, 1) ? ($faker->colorName . ' ') : '')
                .(rand(0, 2) ? ($faker->streetSuffix . ' ') : '')
                . $faker->cityPrefix . ' '
                . (rand(0, 2) ? ($faker->citySuffix . ' ') : ''),
                'price' => $price,
                'discount' => rand(0, 2) ? 0 : $price * $faker->numberBetween(50, 100) / 100,
                'description' => $faker->sentence(200),
            ]);
        }

        foreach (range(1, 20) as $index) {
            DB::table('invoices')->insert([
                'invoice_number' => 'FV-' . (1000 + $index),
                'invoice_date' => $faker->date(),
                'client_id' => $faker->numberBetween(1, 40),
            ]);

            foreach (range(1, rand(1, 5)) as $index2) {
                DB::table('product_invoices')->insert([
                    'product_id' => $faker->numberBetween(1, $products),
                    'invoice_id' => $index,
                    'quantity' => $faker->numberBetween(1, 10),
                    'in_row' => $index2,
                ]);
            }

        }
    }
}
