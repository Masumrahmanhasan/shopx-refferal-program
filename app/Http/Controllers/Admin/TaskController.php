<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskStoreRequest;
use App\Models\Media;
use App\Models\Task;
use Illuminate\Http\RedirectResponse;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::query()->with('thumbnail')->get();
        return view('admin.tasks.index', compact('tasks'));
    }

    public function create()
    {

    }

    /**
     * Store a task
     * @param TaskStoreRequest $request
     * @return RedirectResponse
     */
    public function store(TaskStoreRequest $request): RedirectResponse
    {
        $task = Task::query()->create($request->validated());

        Media::upload($task, $request->file('thumbnail'), 'media/task/thumbnail', 'thumbnail');
        return redirect()->route('admin.tasks.index');
    }

    /**
     * Delete resource
     * @param Task $task
     * @return RedirectResponse
     */
    public function destroy(Task $task): RedirectResponse
    {
        $task->delete();
        return redirect()->back();
    }
}
