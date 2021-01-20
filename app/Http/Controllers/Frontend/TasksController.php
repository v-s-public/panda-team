<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class TasksController extends Controller
{
    protected string $viewsFolderPrefix = 'frontend.tasks';
    protected string $routePrefix = 'frontend.tasks';

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index() : View
    {
        $tasks = Task::all();
        return view($this->viewsFolderPrefix . '.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create() : View
    {
        $routePrefix = $this->routePrefix;
        return view($this->viewsFolderPrefix . '.create', compact('routePrefix'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  TaskRequest  $request
     * @return RedirectResponse
     */
    public function store(TaskRequest $request) : RedirectResponse
    {
        Task::create($request->all());
        return redirect(route($this->routePrefix . '.index'));
    }
}
