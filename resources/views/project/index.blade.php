@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-2">
                <div class="card-header">@lang('Projects Available')</div>
                <div class="card-body">
                    <ul class="list-group">

                        @forelse ($projects as $project)
                        <a class="list-group-item d-flex justify-content-between align-items-center"
                            href="{{route('project.show', ['project' => $project->id])}}">
                            {{$project->name}}
                            <span class="badge badge-primary badge-pill">{{ $project->tasks()->count() }}
                                @lang('tasks')</span>
                        </a>
                        @empty

                        @endforelse

                    </ul>
                </div>
            </div>

        </div>

    </div>
</div>
@endsection