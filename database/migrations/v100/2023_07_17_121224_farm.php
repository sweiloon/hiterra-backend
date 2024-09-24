<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('farm', function (Blueprint $table) {
        $table->uuid('id')->primary();
        $table->uuid('userID')->nullable();
        $table->foreign('userID')->references('id')->on('user')->onDelete('cascade');
        $table->string('farmName')->nullable();
        $table->string('latitude')->nullable();
        $table->string('longitude')->nullable();
        $table->text('address')->nullable();
        $table->uuid('contactID')->nullable();
        $table->foreign('contactID')->references('id')->on('contact')->onDelete('cascade');
        $table->string('landSize')->nullable();
        $table->integer('landSizeUnitID')->unsigned()->nullable();
        $table->foreign('landSizeUnitID')->references('id')->on('unit_type')->onDelete('cascade');
        $table->string('totalAreaHarvested')->nullable();
        $table->integer('totalAreaHarvestedUnitID')->unsigned()->nullable();
        $table->foreign('totalAreaHarvestedUnitID')->references('id')->on('unit_type')->onDelete('cascade');
        $table->text('image')->nullable();
        $table->integer('status')->default(1)->comment('0 - Default, 1 - Active, 2 - Inactive, 3 - Deleted');
        $table->string('createdBy')->default(0);
        $table->timestamp('createdAt')->useCurrent();
        $table->string('updatedBy')->default(0);
        $table->timestamp('updatedAt')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('farm');
    }
};
