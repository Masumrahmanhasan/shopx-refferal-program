<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\RedirectResponse;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::query()->paginate(10);
        return view('task', compact('tasks'));
    }

    /**
     * @param Task $task
     * @return RedirectResponse
     */
    public function takeTask(Task $task): RedirectResponse
    {
        if (auth()->check() && auth()->user()->status === 'active') {
            auth()->user()?->increment('balance', $task->price);

            return redirect()->away($task->link);
        }
        return redirect()->route('payment.index');
    }
}
