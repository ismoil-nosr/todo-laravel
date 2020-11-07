<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\{StoreTaskRequest, UpdateTaskRequest, DestroyTaskRequest};
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TasksController extends Controller
{
    /**
     * Returns collection of tasks of current user
     *
     * @return object Tasks
     */
    public function index()
    {
        return TaskResource::collection(Auth::user()->tasks()->get());
    }

    /**
     * Create new Task model
     *
     * @param StoreTaskRequest $request
     * @return object Task model
     */
    public function store(StoreTaskRequest $request) 
    {
        $data = $request->validated();
        return Task::create($data);
    }
 
    /**
     * Update model
     *
     * @param UpdateTaskRequest $request
     * @param Task $task
     * @return void
     */
    public function update(UpdateTaskRequest $request, Task $task) 
    {
        $task->update($request->validated());

        return response()->json('success');
    }

    /**
     * Delete Task model
     *
     * @param Task $task
     * @return void
     */
    public function destroy(Task $task) 
    {
        if ($task) {
            $task->delete();
            return response()->json('success');
        } else {
            return response()->json('No matched records!');
        }

        return response()->json('Hi there!');
    }

    /**
     * Bulk removing of Task models. Get ids by $request
     *
     * @param Request $request
     * @return void
     */
    public function bulkDelete(Request $request) 
    {
        Task::where('owner_id', auth('web')->user()->id)
            ->whereIn('id', $request->ids)->delete();

        return response()->json('ss');
    }

    /**
     * Bulk updating completed state of all models
     *
     * @param Request $request
     * @return void
     */
    public function bulkComplete(Request $request) 
    {
        Task::where('owner_id', auth('web')->user()->id)
            ->update(['completed' => $request->completed]);

        return response()->json('ss');
    }
}