<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSearchAbstractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('search_abstracts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->mediumText('abstract');
            $table->integer('searchable_id')->unsigned();
            $table->string('searchable_type');
            $table->timestamps();
        });

        \DB::statement('ALTER TABLE search_abstracts ADD FULLTEXT full(title, abstract)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('search_abstracts');
    }
}
