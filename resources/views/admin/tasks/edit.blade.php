@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form id="form" action="{{ route($routePrefix . '.update', $model->id) }}" method="post">
                        <div class="card-header">
                            <h3>Adding a Task</h3>
                        </div>
                        <div class="card-body">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="username">Username *</label>
                                        <input type="text" class="form-control" id="username" name="username" value="{{ $model->username }}" readonly>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="email">E-mail *</label>
                                        <input type="text" class="form-control" id="email" name="email" value="{{ $model->email }}" readonly>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="status" name="status" {{ $model->status ? 'checked' : '' }}>
                                            <label class="form-check-label" for="status">
                                                Check as Done
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="text">Task Text *</label>
                                        <textarea class="form-control" name="text" id="text" cols="30" rows="7">{{ $model->text }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route($routePrefix . '.index') }}" class="btn btn-secondary">Back</a>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <!-- Laravel Javascript Validation -->
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js') }}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\TaskRequest', '#form'); !!}
@endsection

