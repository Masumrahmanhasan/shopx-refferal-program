<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::query()->paginate(10);
        return view('task', compact('tasks'));
    }
}
