<div class="card mt-2">
    <div class="card-header">@lang('Project Tasks')</div>
    <div class="card-body">
        @if ($tasks->isNotEmpty())
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Priority</th>
                    <th scope="col">Options</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($tasks as $task)
                <tr>
                    <td>{{ $task->name }}</td>
                    <td>{{ $task->priority }}</td>
                    <td>
                        <a href="{{ URL::route('task.edit', ['project'=> $project->id, 'task'=>$task->id]) }}"
                            class="btn btn-sm
                            btn-outline-info"> Edit</a>

                            <form action="{{ URL::route('task.destroy', ['project'=> $project->id, 'task'=>$task->id]) }}" class="d-inline" method="post">
                               @method('DELETE')
                                <button type="submit"
                                    class="btn btn-sm
                                    btn-outline-danger"> Delete</button>
                            </form>
                    </td>
                </tr>
                @empty

                @endforelse
            </tbody>
        </table>


        {{ $tasks->links() }}
        @else
        <p>@lang('No Tasks')</p>
        @endif
    </div>
</div>
