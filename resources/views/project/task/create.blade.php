@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            @include('project.part.details')
        </div>


        <div class="col-md-8">
            @include('project.task.part.form')
        </div>

    </div>
</div>
@endsection