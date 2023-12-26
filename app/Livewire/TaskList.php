<?php

namespace App\Livewire;

use App\Models\Task;
use Illuminate\Http\RedirectResponse;
use Livewire\Component;

class TaskList extends Component
{
    public function render()
    {
        $completedTaskIds = auth()->user()->tasks->pluck('id')->toArray();
        $tasks = Task::query()->whereNotIn('id', $completedTaskIds)->get();
        return view('livewire.task-list', ['tasks' => $tasks]);
    }

    /**
     * @param $task
     * @return RedirectResponse|void
     */
    public function completeTask($task)
    {
        if (auth()->check() && auth()->user()->status === 'active') {

            $task = $user->tasks()->find($task['id']);

            if (!$task) {
                auth()->user()->increment('balance', $task['price']);
                auth()->user()->tasks()->attach($task['id']);

                $url = $task['url'];
                $reloadParameter = '?reload=true';
                $this->dispatch('openNewTab', [$url . $reloadParameter]);
            }

            return redirect()->route('task');

        } else {
            return redirect()->route('payment.index');
        }
    }
}
