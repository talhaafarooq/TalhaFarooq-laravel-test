<?php

namespace App\Http\Controllers\API;

use App\Contracts\TaskRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\TaskRequest;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function __construct(private TaskRepositoryInterface $taskRepo) {}

    public function index()
    {
        return $this->taskRepo->getAllTasks();
    }

    public function store(TaskRequest $request)
    {
        return $this->taskRepo->createNewTask($request->validated());
    }

    public function show(string $id)
    {
        return $this->taskRepo->findTask($id);
    }

    public function update(Request $request, string $id)
    {
        return $this->taskRepo->updateTask($request->validated(), $id);
    }

    public function destroy(string $id)
    {
        return $this->taskRepo->deleteTask($id);
    }
}
