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
        // Create a new table named 'tasks'
        Schema::create('tasks', function (Blueprint $table) {
            // Add an auto-incrementing primary key column named 'id'
            $table->id();

            // Add a column named 'title' to store the task's title as a string
            $table->string('title')->nullable();

            // Add a column named 'description' to store a detailed description of the task as text
            $table->text('description')->nullable();

            // Add a column named 'status' to store the task's completion status as a boolean (true or false)
            $table->boolean('completed')->nullable();

            // Add a column named 'due_date' to store the task's due date as a date
            $table->date('due_date')->nullable();

            // Add timestamp columns for created_at and updated_at
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
