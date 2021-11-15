@extends('layouts.master')

@section('content')
    <h1>Todo List <a href="{{ url('/todo/create') }}" class="btn btn-primary pull-right btn-sm">Add New Todo</a></h1>
    <hr/>

    @include('partials.flash_notification')

    @if(count($todoList))
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                    <th>ToDo Title</th>
                    <th>ToDo Body</th>
                    <th>Completed</th>
                    <th>Action</th>
                </tr>
                </thead>

                <tbody>
                @foreach($todoList as $todo)
                    <tr>
                        <td>{{ $todo->title }}</td>
                        <td>{{ $todo->body }}</td>
                        <td>{{ $todo->complete? 'Completed' : 'Pending' }}</td>
                        <td>
                            <a href="{{ route('todo.edit', ['id' => $todo->id]) }}" class="btn btn-primary">
                                    Edit
                            </a>
                            <a  href="{{ route('todo.destroy', ['id' => $todo->id]) }}" class="btn btn-danger">
                                    Delete
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="text-center">
            {!! $todoList->render() !!}
        </div>
    @else
        <div class="text-center">
            <h3>No todos available yet</h3>
            <p><a href="{{ url('/todo/create') }}">Create new todo</a></p>
        </div>
    @endif
@endsection