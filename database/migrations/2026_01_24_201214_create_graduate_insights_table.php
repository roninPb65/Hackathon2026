<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGraduateInsightsTable extends Migration
{
    public function up()
    {
        Schema::create('graduate_insights', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('job_title');
            $table->string('company')->nullable();
            $table->text('success_story');
            $table->json('key_actions'); // Array of actions that helped
            $table->integer('time_to_hire'); // months
            $table->boolean('is_approved')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('graduate_insights');
    }
}
