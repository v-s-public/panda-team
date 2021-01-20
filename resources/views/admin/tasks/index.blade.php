@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Tasks Management</h3>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Username</th>
                                <th>E-mail</th>
                                <th>Text</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tasks as $task)
                                <tr>
                                    <td>{{ $task->username }}</td>
                                    <td>{{ $task->email }}</td>
                                    <td>{{ $task->text }}</td>
                                    <td>{{ $task->status ? 'Done' : 'New' }}</td>
                                    <td><a href="{{ route($routePrefix . '.edit', $task->id) }}" class="btn btn-primary">Edit</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
