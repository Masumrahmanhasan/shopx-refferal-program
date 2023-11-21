<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\RedirectResponse;

class TaskController extends Controller
{
    public function index()
    {
        return view('task');
    }

    /**
     * @param Task $task
     * @return RedirectResponse
     */
    public function takeTask(Task $task): RedirectResponse
    {
        if (auth()->check() && auth()->user()->status === 'active') {
            auth()->user()?->increment('balance', $task->price);
            auth()->user()?->tasks()->attach($task);
            return redirect()->away($task->url);
        }
        return redirect()->route('payment.index');
    }
}
