<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskStoreRequest;
use App\Models\Media;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::query()->with('thumbnail')->get();
        return view('admin.tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('admin.tasks.create');
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
     * @return JsonResponse
     */
    public function destroy(Task $task): JsonResponse
    {
        $task->delete();
        return response()->json([
            'success' => true,
            'message' => 'Task deleted successfully'
        ]);
    }

    public function bulkDelete(Request $request)
    {
        Task::query()->whereIn('id', $request->task_id)->delete();
        return response()->json(['message' => 'Tasks Deleted successfully'], 200);
    }
}
