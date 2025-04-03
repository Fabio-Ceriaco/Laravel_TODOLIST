@extends('layouts.main_layout')

@section('content')

<section class="container-fluid">
    <div class="row">
        <div class="col">
            <h3>TODO LIST</h3>
            <hr>
            <h3 class="text-center mb-5">EDIT TASK</h3>

            <form action="{{route('edit_task_submit')}}" method="post">
                @csrf
                <input type="hidden" name="task_id" value="{{$task->id}}">
                <div class="row">
                    <div class="col-sm-4 offset-sm-4">
                        <div class="form-group">
                            <label for="text_edit_task" class="form-label">Task:</label>
                            <input type="text" name="text_edit_task" id="text_edit_task" class="form-control" value="{{$task->task}}">
                        </div>

                        <div class="form-group mt-3">
                            <a href="{{route('home')}}" class="btn btn-secondary">Cancel</a>
                            <input type="submit" value="Edit" class="btn btn-primary">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

@endsection
