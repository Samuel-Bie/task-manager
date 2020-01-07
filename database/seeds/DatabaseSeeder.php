<?php

use App\Task;
use App\Project;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory(Project::class, rand(2, 5))->create()->each(function ($project) {
            $project->tasks()->saveMany(
                factory(Task::class, rand(2, 4))->make()
            );
        });
    }
}
