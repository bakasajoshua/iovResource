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
        Schema::create('sermons', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->integer('speaker_id');
            $table->integer('sermon_category_id');
            $table->string('sermon_series_id')->nullable();
            $table->text('cover_image');
            $table->text('sermon_content');
            $table->enum('type',['audio','video','other']);
            $table->bigInteger('uploaded_by');
            $table->timestamp('uploaded_at');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sermons');
    }
};
