@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Tasks List</h3>
                    </div>
                    <div class="card-body">
                        <div class="add-button-container m-1">
                            <a href="{{ route('frontend.tasks.create') }}" class="btn btn-primary">Add Task</a>
                        </div>
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="username-column">@sortablelink('username','Username')</th>
                                <th class="email-column">@sortablelink('email','E-mail')</th>
                                <th>Text</th>
                                <th class="status-column">@sortablelink('status','Status')</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($tasks as $task)
                                    <tr>
                                        <td>{{ $task->username }}</td>
                                        <td>{{ $task->email }}</td>
                                        <td>{{ $task->text }}</td>
                                        <td>{{ $task->status ? 'Edited by Admin' : 'New' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {!! $tasks->appends(\Request::except('page'))->render() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
