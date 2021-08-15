<?php

namespace Database\Seeders;

use Hash;
use DB;
use Carbon\Carbon;
use App\Models\Admin;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('admins')->delete();
        $admins = [
        	[
        		'name' => 'Jack Kamau Kioko',
        		'email' => 'jack@gmail.com',
        		'title' => 'Admin 1',
        		'phone_no' => '0734567809',
        		'area' => 'Kitale',
        		'image' => 'image.png',
        		'keywords' => 'Jack Kamau, Kitale',
        		'slug' => Str::slug('Jack Kamau, Kitale','-'),
        		'password' => Hash::make('Jack0000**'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	],

        	[
        		'name' => 'Jane Ayiro Anita',
        		'email' => 'janea@gmail.com',
        		'title' => 'Admin 2',
        		'phone_no' => '0712567809',
        		'area' => 'Bungoma',
        		'image' => 'image.png',
        		'keywords' => 'Jane Ayiro, Kitale',
        		'slug' => Str::slug('Jack Kamau, Bungoma','-'),
        		'password' => Hash::make('Janea0000**'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	],
        ];

        Admin::insert($admins);
    }
}
