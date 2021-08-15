<?php

namespace Database\Seeders;

use DB;
use Carbon\Carbon;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('categories')->delete();
        $categories = [
        	[
        		'name' => 'Politics',
        		'description' => 'The latest political news in Kenya and around the world',
        		'keywords' => 'latest polical news in Kenya, political news around the world',
        		'slug' => Str::slug('Politics','-'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	],

        	[
        		'name' => 'Sports',
        		'description' => 'The latest sports news in Kenya and around the world',
        		'keywords' => 'latest sports news in Kenya, sports news around the world',
        		'slug' => Str::slug('Sports','-'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	],

        	[
        		'name' => 'Entertainment',
        		'description' => 'The latest entertainment news in Kenya and around the world',
        		'keywords' => 'latest entertainment news in Kenya, entertainment news around the world',
        		'slug' => Str::slug('Entertainment','-'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	],

        	[
        		'name' => 'Business',
        		'description' => 'The latest business news in Kenya and around the world',
        		'keywords' => 'latest business news in Kenya, business news around the world',
        		'slug' => Str::slug('Business','-'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	]
        ];

        Category::insert($categories);
    }
}
