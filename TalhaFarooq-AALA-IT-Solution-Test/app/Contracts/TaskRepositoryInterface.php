<?php

namespace App\Contracts;

interface TaskRepositoryInterface
{
    public function getAllTasks();

    public function createNewTask(array $data);

    public function findTask(string $id);

    public function updateTask(array $data, $id);

    public function deleteTask(string $id);
}
