<?php

namespace App\Services;

use App\Contracts\TaskRepositoryInterface;
use App\Traits\ResponseTrait;
use Illuminate\Support\Facades\Auth;
use App\Events\TaskCreated;
use Exception;
use Illuminate\Support\Facades\DB;

class TaskService implements TaskRepositoryInterface
{
    use ResponseTrait;
    public function getAllTasks()
    {
        return $this->sendResponse(Auth::user()->tasks,"Task retreived successfully!", 200);
    }

    public function createNewTask(array $data)
    {
        try{
            DB::beginTransaction();

            // Create a new task for the authenticated user with the provided data
            $task = Auth::user()->tasks->create($data);
        
            // Dispatch the TaskCreated event
            event(new TaskCreated($task));

            DB::commit();
            return $this->sendResponse($task,"Task created successfully", 201);
        }catch(Exception $ex){
            DB::rollBack();
            return $this->sendError($ex->getMessage(), 500);
        }
    }

    public function findTask(string $id) {
        $task = Auth::user()->tasks->findOrFail($id);
        return $this->sendResponse($task,"Task retreived successfully", 200);
    }

    public function updateTask($data, $id) {
        try{
            DB::beginTransaction();


            $task = Auth::user()->tasks->findOrFail($id);
            $task->update($data);

            DB::commit();
            return $this->sendResponse($task,"Task updated successfully", 200);
        }catch(Exception $ex){
            DB::rollBack();
            return $this->sendError($ex->getMessage(), 500);
        }
    }

    public function deleteTask(string $id) {
        Auth::user()->tasks->findOrFail($id)->delete();
        return $this->sendResponse([],"Task deleted successfully", 200);
    }
}
