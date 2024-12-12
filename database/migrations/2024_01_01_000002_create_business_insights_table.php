<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('business_insights', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('business_field');
            $table->string('target_market');
            $table->text('insight');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('business_insights');
    }
};