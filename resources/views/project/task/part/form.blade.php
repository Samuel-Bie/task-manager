<div class="card">
    <div class="card-header">Create new task</div>

    <div class="card-body">
        <form action="{{ URL::route('task.store', ['project'=>$project->id]) }}" method="POST"
            enctype="multipart/form-data">
            @method('POST')
            @csrf
            <div class="form-group">
                <label for="name">name</label>
                <input type="text" required class="form-control" id="name" name="name"
                    placeholder="Manage routes">
            </div>


            <div class="form-group">
                <label for="priority">Priority</label>
                <input type="number" required class="form-control" id="priority" name="priority"
                >
            </div>


            <button type="submit" class="btn btn-outline-primary">
                Enviar
            </button>
        </form>
    </div>

</div>