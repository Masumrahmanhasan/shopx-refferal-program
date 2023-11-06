<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::query()->with('thumbnail')->paginate();
        return view('admin.tasks.index', compact('tasks'));
    }

    public function create()
    {
        
    }
}
