<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPlanInUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('plan')->nullable();
            $table->string('paid')->nullable();
            $table->integer('product_number')->nullable();
            $table->decimal('product_percent', 10, 2)->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('plan');
            $table->dropColumn('paid');
            $table->dropColumn('product_number');
            $table->dropColumn('product_percent');
        });
    }
}
