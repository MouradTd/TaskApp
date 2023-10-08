<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{

    public function show()
    {
        // Get the authenticated user
        $user = Auth::user();

        // Get tasks associated with the authenticated user
        $tasks = $user->tasks; // Assuming you have defined a relationship in User model

        // Return the tasks
        return response(['tasks' => $tasks]);
    }
    //
    public function create(CreateTaskRequest $request)
    {
        $data = $request->validated();

        $task = Task::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'status' => $data['status'] ? 'incomplete' : "",
            'user_id' => $data['user_id'],
        ]);


        return response([
            'task' => $task,
        ]);
    }


    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'status' => 'required|string',
            // Add other validation rules as needed
        ]);

        // Find the task by ID
        $task = Task::find($id);

        if (!$task) {
            // Handle task not found, return an error response, etc.
            return response(['error' => 'Task not found'], 404);
        }

        // Update the task with the validated data
        $task->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'status' => $request->input('status'),
            // Update other fields as needed
        ]);

        // Return a response, redirect, or whatever fits your application
        return response(['message' => 'Task updated successfully']);
    }
    public function destroy($id)
    {
        // Find the task by ID
        $task = Task::find($id);

        if (!$task) {
            // Handle task not found, return an error response, etc.
            return response(['error' => 'Task not found'], 404);
        }

        // Delete the task
        $task->delete();

        // Return a response, redirect, or whatever fits your application
        return response(['message' => 'Task deleted successfully']);
    }
}
