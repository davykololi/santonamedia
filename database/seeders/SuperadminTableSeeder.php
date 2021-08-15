<?php

namespace Database\Seeders;

use DB; 
use Carbon\Carbon;
use App\Models\Superadmin; 
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
        DB::table('superadmins')->delete();
        Superadmin::create([
        			'name' => 'Kololi David',
        			'email' => 'kololimdavid@gmail.com',
        			'title' => 'Engineer',
        			'password' => Hash::make('kenyayangu17'),
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        			]);  
 
    }
}
