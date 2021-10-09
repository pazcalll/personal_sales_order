<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTbTrackings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('trackings', function($table) {
            $table->dropColumn('order_id');            
            $table->unsignedBigInteger('tagihan_id')->nullable();
            
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');

            $table->foreign('tagihan_id')->references('id')->on('tagihans')->onDelete('cascade');        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('trackings', function($table) {
            $table->dropColumn('tagihan_id');            
            $table->unsignedBigInteger('order_id');
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
        });        
    }
}
