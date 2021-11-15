@extends('layouts.master')

@section('content')
<div class="header">
    <h1>Create New Todo</h1>
    <div class="">
        <a href="{{ route('todo.index') }}" >Go Back</a>
    </div>
</div>
<hr/>

<div class="container mt-5" style="width: 400px">

    <form method="post" class="todo-form" id="create_todo" enctype="multipart/form-data" action="javascript:void(0)">
        <div class="form-group">
            <label>Title</label>
            <input type="text" class="form-control" name="title" id="title">
        </div>

        <div class="form-group">
            <label>Body</label>
            <textarea class="form-control" name="body" id="body" rows="4"></textarea>
        </div>

        <div class="form-group">
            <label>Due Date</label>
            <input type="date" class="form-control" id="due_date" name="due_date">
        </div>

        <div class="form-group">
            <label>Attachment</label>
            <input type="file" name="media" id="attachment" />
        </div>

        <div class="form-group">
            <div class="checkbox">
                <label>
                    <input type="checkbox" id="completed" > Completed
                </label>
            </div>
        </div>

        <button type="submit" class="btn-block btn btn-primary">Submit</button>
    </form>
</div>

<script>
    var createTodo = "<?php echo route('todo.store'); ?>";
</script>


@endsection