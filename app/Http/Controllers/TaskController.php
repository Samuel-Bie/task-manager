<?php

namespace App\Http\Controllers;

use App\Task;
use App\Project;
use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;
use App\Http\Controllers\Controller;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Project $project)
    {
        $tasks = $project->tasks()->paginate();
        return $this->showTasks($tasks);
    }


    public function  alternativeIndex()
    {
        $tasks = Task::paginate();;
        return $this->showTasks($tasks);
    }

    private function showTasks($tasks)
    {
        return view('project.task.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Project $project)
    {
        return view('project.task.create', compact('project'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskRequest $request, Project $project)
    {
        //
        $task = new Task();
        $task->name = $request->input('name');
        $task->priority = $request->input('priority');
        $task->project()->associate($project);
        $task->save();
        return redirect(route('project.show', ['project' => $project->id]))->with('status', 'Task created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
        return view('task.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project, Task $task)
    {
        //
        $projects = Project::all();

        return view('project.task.edit', compact('task', 'projects'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TaskRequest $request, Project $project, Task $task)
    {
        $task->name = $request->input('name');
        $task->priority = $request->input('priority');
        $task->save();
        return redirect(route('project.show', ['project' => $project->id]))->with('status', 'Task updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect(route('task.index'))->with('status', 'Task Deleted');
    }
}
