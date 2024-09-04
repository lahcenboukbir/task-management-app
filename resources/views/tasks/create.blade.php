@extends('layouts.app')

@section('title')
    Index
@endsection

@section('content')
    <div class="container">
        <h1>Create</h1>
    
        <form action="{{ route('tasks.store') }}" method="POST" class="mt-3">
            @csrf    
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>
    
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" rows="3" name="description"></textarea>
            </div>

            <div class="mb-3 form-check">
                <input type="hidden" class="form-check-input" id="completed" name="completed" value="0">
                <input type="checkbox" class="form-check-input" id="completed" name="completed" value="1">
                <label class="form-check-label" for="completed">Completed</label>
            </div>
    
            <div class="mb-3">
                <label class="form-check-label" for="due_date">Due date</label>
                <input type="date" name="due_date" id="due_date">
            </div>

            <a href="{{ url()->previous() }}" class="mt-3 me-3 btn btn-secondary">
                <i class="bi bi-arrow-left-circle"></i>
            </a>
            
            <button type="submit" class="btn btn-secondary mt-3">Create</button>
        </form>
    </div>
@endsection

