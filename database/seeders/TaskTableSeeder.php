<?php

namespace Database\Seeders;

use App\Models\Media;
use App\Models\Task;
use Illuminate\Database\Seeder;

class TaskTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Task::factory()->count(200)->create()->each(function (Task $task) {
            $this->uploadImage($task, 'thumbnail');
        });
    }

    private function uploadImage($parent, $type)
    {
        $image = rand(1, 99);
        return Media::query()->create([
            'name' => "https://randomuser.me/api/portraits/men/{$image}.jpg",
            'parent_id' => $parent->id,
            'parent_type' => get_class($parent),
            'type' => $type,
            'meta' => []
        ]);
    }

}
