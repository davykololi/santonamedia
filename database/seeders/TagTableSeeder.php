<?php

namespace Database\Seeders;

use DB;
use Carbon\Carbon;
use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('tags')->delete();
        $tags = [
        	[
        		'name' => 'Kenya',
        		'desc' => 'The latest breaking and local news in Kenya',
        		'keywords' => 'latest lacal news in kenya, breaking news in Kenya',
        		'slug' => Str::slug('Kenya','-'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	],

        	[
        		'name' => 'East Africa',
        		'desc' => 'The latest breaking and local news in East Africa',
        		'keywords' => 'latest lacal news in East Africa, breaking news in East Africa',
        		'slug' => Str::slug('East Africa','-'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	],

        	[
        		'name' => 'Africa',
        		'desc' => 'The latest breaking and local news in Africa',
        		'keywords' => 'latest lacal news in Africa, breaking news in East Africa',
        		'slug' => Str::slug('Africa','-'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	],

        	[
        		'name' => 'Europe',
        		'desc' => 'The latest breaking and local news in Europe',
        		'keywords' => 'latest breaking and lacal news in Europe, breaking news in Europe',
        		'slug' => Str::slug('Europe','-'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	],
        ];

        Tag::insert($tags);
    }
}
