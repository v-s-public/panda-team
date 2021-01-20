<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Http\Requests\TaskRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class TasksController extends Controller
{
    protected string $viewsFolderPrefix = 'admin.tasks';
    protected string $routePrefix = 'admin.tasks';

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index() : View
    {
        $tasks = Task::all();
        $routePrefix = $this->routePrefix;

        return view($this->viewsFolderPrefix . '.index', compact('tasks', 'routePrefix'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return View
     */
    public function edit(int $id) : View
    {
        $model = Task::find($id);
        $routePrefix = $this->routePrefix;

        return view($this->viewsFolderPrefix . '.edit', compact('model', 'routePrefix'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  TaskRequest  $request
     * @param  int  $id
     * @return RedirectResponse
     */
    public function update(TaskRequest $request, int $id) : RedirectResponse
    {
        $model = Task::find($id);

        $request->merge(['status' => (boolean)$request->get('status')]);

        $model->update($request->all());
        return redirect(route($this->routePrefix . '.index'));
    }
}
