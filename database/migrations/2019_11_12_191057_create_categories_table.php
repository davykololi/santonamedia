<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('slug')->nullable();
            $table->text('description');
            $table->timestamps();
        });

        $categories = [
                [
                    'name' => 'SPORTS',
                    'slug' => 'sports',
                    'description' => 'Sports News'
                ],

                [
                    'name' => 'LIFESTYLE & HEALTH',
                    'slug' => 'lifestyle-and-health',
                    'description' => 'Lifestyle & Health News'
                ],

                [
                    'name' => 'POLITICS',
                    'slug' => 'politics',
                    'description' => 'Politics News'
                ],

                [
                    'name' => 'BUSINESS',
                    'slug' => 'business',
                    'description' => 'Business News'
                ],

                ];

        foreach ($categories as $category)
            DB::table('categories')->insert($category);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
