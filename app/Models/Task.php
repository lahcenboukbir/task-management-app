<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    // Use the HasFactory trait to enable factory methods for the model
    use HasFactory;

    // Specify which attributes can be mass-assigned
    protected $fillable = [
        'title',        // The title of the task
        'description',  // A detailed description of the task
        'completed',       // The completion status of the task (boolean)
        'due_date'      // The due date for the task
    ];
}
