@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Task</div>

                <div class="card-body">
                    <form action="{{ URL::route('task.update', ['project'=>$task->project->id, 'task' => $task->id]) }}"
                        method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="name">name</label>
                            <input type="text" required class="form-control" id="name" name="name"
                                value="{{old('name')?? $task->name}}" placeholder="Create ...">
                        </div>


                        <div class="form-group">
                            <label for="priority">Priority</label>
                            <input type="number" required class="form-control" id="priority" name="priority"
                                value="{{old('priority')?? $task->priority}}">
                        </div>


                        <button type="submit" class="btn btn-outline-primary">
                            Enviar
                        </button>
                    </form>
                </div>

            </div>


        </div>

    </div>
</div>
@endsection