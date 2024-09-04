@extends('layouts.app')

@section('title')
    Index
@endsection

@section('content')
    <div class="container">
        <h1>Home</h1>
        <table class="table table-hover caption-top mt-3 text-center">
            <caption>List of users</caption>
            <thead>
                <tr class="table-dark">
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Completed</th>
                    <th scope="col">Due Date</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($tasks as $task)
                    <tr style='text-decoration: {{$task->completed ? 'line-through' : ''}}'>
                        <td scope="row">{{ $task->id }}</td>
                        <td>{{ $task->title ? $task->title : 'N/A' }}</td>
                        <td>{{ $task->description ? $task->description : 'N/A' }}</td>
                        <td>{{ $task->completed ? 'Completed' : 'Pending' }}</td>
                        <td>{{ $task->due_date }}</td>

                        <td style='text-decoration: none !important'>
                            <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-secondary">
                                <i class="bi bi-three-dots"></i>
                            </a>

                            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-success">
                                <i class="bi bi-pencil-square"></i>
                            </a>

                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger ">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">N/A</td>
                    </tr>
                @endforelse

            </tbody>
        </table>

        <a href="{{ route('tasks.create') }}" type="button" class="btn btn-secondary mt-3">Create a task</a>
    </div>
@endsection
