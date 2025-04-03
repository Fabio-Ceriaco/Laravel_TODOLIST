@extends('layouts.main_layout')

@section('content')

<section class="container-fluid">
    <div class="row">
        <div class="col">
            <h3>TODO LIST</h3>
            <hr>
            <div class="row">
                <div class="col my-2">
                    <a href="{{route('new_task')}}" class="btn btn-primary">Create Task</a>
                </div>
                <div class=" col my-2 text-start">
                    <a href="{{route('home')}}" class="btn btn-primary">See tasks visible</a>
                </div>
            </div>

            <hr>
            @if ($tasks->count() === 0)
            <p class="text-center">No task available</p>
            @else
            <table class="table table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>Task</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tasks as $task)
                    <tr>
                        <td style="width: 70%">{{$task->task}}</td>
                        <td>
                            {{-- done / not done--}}
                            @if($task->done == null)
                            <a href="{{route('task_done', ['id' => $task->id])}}" class="btn btn-primary btn-sm "><i class="fa-solid fa-check"></i></a>
                            @else
                            <a href="{{route('task_not_done', ['id' => $task->id])}}" class="btn btn-success btn-sm "><i class="fa-solid fa-times"></i></a>
                            @endif

                            {{-- editar --}}
                            <a href="{{route('edit_task_frm', ['id' => $task->id])}}" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></a>

                            {{-- visivel / invisivel--}}
                            @if($task->visible == 1)
                            <a href="{{route('task_invisible', ['id' => $task->id])}}" class="btn btn-primary btn-sm "><i class="fa-regular fa-eye-slash"></i></a>
                            @else
                            <a href="{{route('task_visible', ['id' => $task->id])}}" class="btn btn-primary btn-sm "><i class="fa-regular fa-eye"></i></a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div>
                <p>Total: <strong>{{$tasks->count()}}</strong></p>
            </div>
            @endif
        </div>
    </div>
</section>

@endsection
