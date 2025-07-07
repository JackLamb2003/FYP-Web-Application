<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DriverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('drivers')->insert(['name' => 'Adam LZ', 'age' => 28, 'car' => 'BMW E36']);
        DB::table('drivers')->insert(['name' => 'Alec Robbins', 'age' => 32, 'car' => 'Nissan 350z']);
        DB::table('drivers')->insert(['name' => 'Andy Hateley', 'age' => 40, 'car' => 'BMW E46']);
        DB::table('drivers')->insert(['name' => 'Aurimas Bakchis', 'age' => 40, 'car' => 'Nissan S15']);
        DB::table('drivers')->insert(['name' => 'Ben Hobson', 'age' => 30, 'car' => 'Ford Mustang RTR Spec 5-FD']);
        DB::table('drivers')->insert(['name' => 'Branden Sorensen', 'age' => 20, 'car' => 'BMW M3']);
        DB::table('drivers')->insert(['name' => 'Chris Forsberg', 'age' => 41, 'car' => 'Nissan Z NISMO']);
        DB::table('drivers')->insert(['name' => 'Conor Shanahan', 'age' => 21, 'car' => 'BMW E36']);
        DB::table('drivers')->insert(['name' => 'Dan Burkett', 'age' => 39, 'car' => 'Toyota Supra MK4']);
        DB::table('drivers')->insert(['name' => 'Daniel Stuke', 'age' => 29, 'car' => 'Nissan Silvia Spec-R']);
        DB::table('drivers')->insert(['name' => 'Dean Kearney', 'age' => 35, 'car' => 'Dodge Viper']);
        DB::table('drivers')->insert(['name' => 'Derak Madison', 'age' => 30, 'car' => 'Nissan S14']);
        DB::table('drivers')->insert(['name' => 'Diego Higa', 'age' => 27, 'car' => 'Toyota GT86']);
        DB::table('drivers')->insert(['name' => 'Dmitriy Brutskiy', 'age' => 38, 'car' => 'BMW E46']);
        DB::table('drivers')->insert(['name' => 'Dylan Hughes', 'age' => 31, 'car' => 'BMW E46']);
        DB::table('drivers')->insert(['name' => 'Federico Sceriffo', 'age' => 41, 'car' => 'Ferrari 599 GTB']);
        DB::table('drivers')->insert(['name' => 'Forest Wang', 'age' => 41, 'car' => 'Nissan S15']);
        DB::table('drivers')->insert(['name' => 'Fredric Aasbo', 'age' => 38, 'car' => 'Toyota Racing GR Supra']);
        DB::table('drivers')->insert(['name' => 'Hiroya Minowa', 'age' => 14, 'car' => 'Toyota GT86']);
        DB::table('drivers')->insert(['name' => 'James Deane', 'age' => 32, 'car' => 'Ford Mustang RTR Spec 5-FD']);
        DB::table('drivers')->insert(['name' => 'Jeff Jones', 'age' => 39, 'car' => 'Nissan 370Z']);
        DB::table('drivers')->insert(['name' => 'Jhonnattan Castro', 'age' => 40, 'car' => 'Toyota GR86']);
        DB::table('drivers')->insert(['name' => 'Joao Barion', 'age' => 36, 'car' => 'C7 Corvette']);
        DB::table('drivers')->insert(['name' => 'Jonathan Hurst', 'age' => 30, 'car' => 'Cadillac XLR']);
        DB::table('drivers')->insert(['name' => 'Kazuya Taguchi', 'age' => 31, 'car' => 'Toyota GT86']);
        DB::table('drivers')->insert(['name' => 'Ken Gushi', 'age' => 37, 'car' => 'Toyota GR86']);
        DB::table('drivers')->insert(['name' => 'kyle Mohan', 'age' => 41, 'car' => 'Mazda RX8']);
        DB::table('drivers')->insert(['name' => 'Matt Field', 'age' => 36, 'car' => 'C6 Corvette']);
        DB::table('drivers')->insert(['name' => 'Mike Power', 'age' => 27, 'car' => 'Nissan S15']);
        DB::table('drivers')->insert(['name' => 'Nick Noback', 'age' => 29, 'car' => 'BMW E46']);
        DB::table('drivers')->insert(['name' => 'Robert Thorne', 'age' => 33, 'car' => 'BMW E46 M3']);
        DB::table('drivers')->insert(['name' => 'Rome Charpentier', 'age' => 37, 'car' => 'BMW E82']);
        DB::table('drivers')->insert(['name' => 'Rudy Hansen', 'age' => 46, 'car' => 'Nissan S13']);
        DB::table('drivers')->insert(['name' => 'Ryan Litteral', 'age' => 35, 'car' => 'Nissan S15']);
        DB::table('drivers')->insert(['name' => 'Ryan Tuerck', 'age' => 39, 'car' => 'Toyota GR Corolla']);
        DB::table('drivers')->insert(['name' => 'Simen Olsen', 'age' => 27, 'car' => 'Nissan S14.9']);
        DB::table('drivers')->insert(['name' => 'Taylor Hull', 'age' => 34, 'car' => 'C6 Corvette']);
        DB::table('drivers')->insert(['name' => 'Trenton Beechum', 'age' => 30, 'car' => 'BMW E46']);
        DB::table('drivers')->insert(['name' => 'Vaughn Gittin JR', 'age' => 43, 'car' => 'Ford Mustang RTR Spec 5-FD']);
    }
}
