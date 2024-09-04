@extends('layouts.app')

@section('title')
    Show
@endsection

@section('content')
    <div class="container">
        <h1>Task Details</h1>

        <table class="table mt-3">
            <tr>
                <th>ID</th>
                <td>{{ $task->id }}</td>
            </tr>
            <tr>
                <th>Title</th>
                <td>{{ $task->title ? $task->title : 'N/A' }}</td>
            </tr>
            <tr>
                <th>Description</th>
                <td>{{ $task->description ? $task->description : 'N/A' }}</td>
            </tr>
            <tr>
                <th>Completed</th>
                <td>{{ $task->completed ? 'Completed' : 'Pending' }}</td>
            </tr>
            <tr>
                <th>Due Date</th>
                <td>{{ $task->due_date }}</td>
            </tr>

        </table>

        <div class="d-flex">
            <a href="{{ url()->previous() }}" class="me-3 btn btn-secondary">
                    <i class="bi bi-arrow-left-circle"></i>
            </a>

            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-success me-3">
                    <i class="bi bi-pencil-square"></i>
            </a>
    
            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">
                    <i class="bi bi-trash"></i>
                </button>
            </form>
        </div>
    </div>
@endsection
