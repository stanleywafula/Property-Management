<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_orders', function (Blueprint $table) {
            $table->id();
            $table->string('subject');
            $table->integer('property_id');
            $table->integer('tenant_id');
            $table->string('category')->nullable();
            $table->integer('amount')->nullable();
            $table->string('charge')->nullable();
            $table->string('entry')->nullable();
            $table->text('notes')->nullable();
            $table->string('status')->nullable();
            $table->string('priority')->nullable();
            $table->timestamp('due_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('work_orders');
    }
}
