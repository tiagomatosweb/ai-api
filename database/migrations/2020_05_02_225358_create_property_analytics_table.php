<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertyAnalyticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_analytics', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('property_id');
            $table->foreign('property_id')
                ->references('id')
                ->on('properties')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');

            $table->unsignedBigInteger('analytic_type_id');
            $table->foreign('analytic_type_id')
                ->references('id')
                ->on('analytic_types')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');
            $table->text('value');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peroperty_analytics');
    }
}
