<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'name'=>'omar2',
            'email'=>'omar@gmail.com',
            'username'=>'omar3',
            'password'=>bcrypt('omar33'),
            'com_code'=>1,
            'status'=>1,
        ]);
    }
}
