@extends('layouts.master')

@section('content')
<div class="header">
    <h1>Update Todo</h1>
    <div class="">
        <a href="{{ route('todo.index') }}" >Go Back</a>
    </div>
</div>
<hr/>

<div class="container mt-5" style="width: 400px">

    <form method="post" class="todo-form" id="update_todo" enctype="multipart/form-data" action="javascript:void(0)">
        <div class="form-group">
            <label>Title</label>
            <input type="text" class="form-control" value="{{ $todo->title }}" name="title" id="title">
        </div>

        <input type="hidden" class="form-control" value="{{ $todo->id }}" name="todo_id" id="todo_id">

        <div class="form-group">
            <label>Body</label>
            <textarea class="form-control" name="body" id="body" rows="4">{{ $todo->body }}</textarea>
        </div>

        <div class="form-group">
            <label>Due Date</label>
            <input type="date" class="form-control" id="due_date" value="{{ $todo->due_date }}" name="due_date">
        </div>
    
        @if($todo->media)
            <div class="form-group">
                <img src="{{ $todo->media }}" style="width:200px"  alt="Upload user profile pic" />
            </div>
        @endif

        <div class="form-group">
            <label>Attachment</label>
            <input type="file" name="media" id="attachment"  />
        </div>

        <div class="form-group">
            <div class="checkbox">
                <label>
                    <input type="checkbox" id="completed" @if($todo->completed) checked @endif> Completed
                </label>
            </div>
        </div>

        <button type="submit" class="btn-block btn btn-primary">Submit</button>
    </form>
</div>

<script>
    var updateTodo = "<?php echo route('todo.update'); ?>";
</script>


@endsection