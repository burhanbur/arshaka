<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('fleet_photos', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('fleet_category_id');
            $table->string('caption')->nullable();
            $table->string('image_path');
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('fleet_category_id')->references('id')->on('fleet_categories')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('fleet_photos');
    }
};
