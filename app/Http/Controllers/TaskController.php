<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class TaskController extends BaseController
{
    public function index()
    {
        $tasks = Task::where('parent_id', 0)->get();

        $response = [
            'tasks' => $tasks
        ];
        return $this->sendResponse($response, 'User register successfully.');
    }

    public function store(Request $request) {
        dd(Auth::user());
        $task = [
            'name' => $request->name,
            'description' => $request->description,
            'user_id' => Auth::user()->id
        ];

        $createTask = Task::create($task);

        return $this->sendResponse($createTask, 'Task created successfully.');
    }
}
