<?php

namespace Database\Seeders;

use DB; 
use App\Superadmin; 
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SuperadminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('superadmins')->delete() ;
        Superadmin::create([
        			'name' => 'Kololi David',
        			'email' => 'kololimdavid@gmail.com',
        			'title' => 'Engineer',
        			'password' => Hash::make('kenyayangu17'),
        			]);  
 
    }
}
