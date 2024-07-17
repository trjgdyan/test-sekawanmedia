<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('rental_companies', function (Blueprint $table) {
            $table->unsignedBigInteger('id_vehicle')->nullable();
            $table->foreign('id_vehicle')->references('id')->on('vehicles')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('reservations', function (Blueprint $table) {
            $table->foreign('id_vehicle')->references('id')->on('vehicles')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('reservations', function (Blueprint $table) {
            $table->foreign('id_driver')->references('id')->on('drivers')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rental_companies', function (Blueprint $table) {
            $table->dropForeign(['id_vehicle']);
            $table->dropColumn('id_vehicle');
        });

        Schema::table('reservations', function (Blueprint $table) {
            $table->dropForeign(['id_vehicle']);
            $table->string('id_vehicle')->change();
        });

        Schema::table('reservations', function (Blueprint $table) {
            $table->dropForeign(['id_driver']);
            $table->dropColumn('id_driver');
        });
    }
};
