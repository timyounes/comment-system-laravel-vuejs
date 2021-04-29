<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblComments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_comments', function(Blueprint $table){
            $table->increments('comment_id');
            $table->string('author');
            $table->text('comment');
            $table->integer('parent_id')->default(0);
            $table->timestamp('created_datetime')->useCurrent();
            $table->index(['comment_id', 'created_datetime']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_comments');
    }
}
