<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve all tasks from the database
        $tasks = Task::all();

        // Return the 'tasks.index' view and pass the retrieved tasks to it
        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Return the 'tasks.create' view for the user to fill out the task creation form
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'title' => 'string',
            'description' => 'string',
            'completed' => 'boolean',
            'due_date' => 'date',
        ]);

        // Create a new task record in the database with the validated data
        Task::create($validated);

        // Redirect the user to the tasks index page after successful creation
        return redirect()->route('tasks.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Retrieve the task with the specified ID from the database
        // The find method returns null if no task is found with the given ID
        $task = Task::find($id);

        // Return the 'tasks.show' view and pass the retrieved task to it
        // The compact function creates an array with the key 'task' and its value
        return view('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Retrieve the task with the specified ID from the database
        // The find method returns the task if found, or null if not
        $task = Task::find($id);

        // Return the 'tasks.edit' view and pass the retrieved task to it
        // The compact function creates an array with the key 'task' and its value
        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $id)
    {
        // Validate the incoming request data
        // Ensure 'title' is a string, 'description' is a string, 'completed' is a boolean, and 'due_date' is a valid date
        $validated = $request->validate([
            'title' => 'string',
            'description' => 'string',
            'completed' => 'boolean',
            'due_date' => 'date',
        ]);

        // Update the task with the validated data
        // The $id variable is actually the Task model instance due to route model binding
        $id->update($validated);

        // Redirect the user back to the list of tasks after the update
        return redirect()->route('tasks.index');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the task with the specified ID in the database
        $task = Task::find($id);

        // If the task is found, delete it from the database
        if ($task) {
            $task->delete();
        }

        // Redirect back to the previous page, typically the task list
        return back();
    }
}
