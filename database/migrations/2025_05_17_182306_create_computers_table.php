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
        Schema::create('computers', function (Blueprint $table) {
            $table->id("computer_id")->unique();
            $table->string('computer_brand');
            $table->string('computer_model');
            $table->double('computer_price');
            $table->integer('computer_ram_size')->nullable();
            $table->boolean('computer_is_laptop')->default(false);
            $table->string('slug')->unique();
            $table->foreignId("fk_category_computer")->nullable()->constrained("categories", "category_id");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('computers', function (Blueprint $table) {
            $table->dropForeign(["fk_category_computer"]);
            $table->dropColumn("fk_category_computer");
        });
    }
};
