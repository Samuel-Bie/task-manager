@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            @include('project.part.details')
        </div>


        <div class="col-md-8">

            <div class="card mb-1">
                <div class="card-body">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="{{ route('task.create', ['project' => $project->id]) }}" class="btn btn-primary">Add
                            task</a>
                        <a href="{{ route('project.edit', ['project' => $project->id]) }}" class="btn btn-success">Edit
                            Project</a>

                        <form action="{{ route('project.destroy', ['project' => $project->id]) }}" method="post"
                            class="d-inline">
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete Project</button>
                        </form>
                    </div>
                </div>
            </div>


            @include('project.part.tasks')
        </div>

    </div>
</div>
@endsection