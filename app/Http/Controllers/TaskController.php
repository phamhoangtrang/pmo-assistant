<?php

namespace App\Http\Controllers;

use App\Models\Constant;
use App\Models\Task;
use App\Models\Project;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function show($project_id, $task_id)
    {
        $task = Task::with([
            'assigneeUser:id,account,name',
            'taskPriority',
            'taskStatus',
            'parent:id,name',
            'creator:id,account,name',
            'worklogs' => function ($query) {
                $query->orderBy('created_at', 'desc');
            },
            'worklogs.user:id,account,name'
        ])->findOrFail($task_id);
        $listAssignee = Project::with('users:id,account')->find($task->project->id)->users;

        return view('tasks.show', compact('task', 'listAssignee'));
    }

    public function updateTask(Request $request, $task_id)
    {
        try {
            // Kiểm tra task có tồn tại không
            $task = Task::findOrFail($task_id);

            // Validate dữ liệu đầu vào
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'nullable|string',
                'memo' => 'nullable|string|max:512',
                'priority' => 'required|integer|min:0|max:9',
                'assignee' => 'nullable|integer|exists:users,id',
                'status' => 'required|integer',
                'plan_start_date' => 'nullable|date',
                'plan_end_date' => 'nullable|date|after_or_equal:plan_start_date',
                'actual_start_date' => 'nullable|date',
                'actual_end_date' => 'nullable|date|after_or_equal:actual_start_date',
                'plan_effort' => 'nullable|numeric|min:0',
            ]);

            // Xử lý `plan_effort`: Nếu bằng '', thì gán thành null
            if ($request->has('plan_effort') && $request->plan_effort === '') {
                $validatedData['plan_effort'] = null;
            }

            // Cập nhật thông tin task
            $task->update($validatedData);

            $task->load([
                'assigneeUser:id,account,name',
                'taskPriority',
                'taskStatus',
                'parent:id,name',
                'creator:id,account,name'
            ]);

            return response()->json([
                'message' => 'Task updated successfully!',
                'task' => $task,
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'message' => 'Task not found!',
                'error' => $e->getMessage(),
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to update task!',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function getStatuses()
    {
        try {
            $statuses = Constant::where('group', 'task_status')->orderBy('key', 'asc')->pluck('key', 'value1');

            return response()->json([
                'message' => 'Get list members of project successfully!',
                'statuses' => $statuses,
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'message' => 'Member not found!',
                'error' => $e->getMessage(),
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to fetch members!',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function getPriorities()
    {
        try {
            $priorities = Constant::where('group', 'task_priority')->orderBy('key', 'desc')->pluck('key', 'value1');

            return response()->json([
                'message' => 'Get list members of project successfully!',
                'priorities' => $priorities,
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'message' => 'Member not found!',
                'error' => $e->getMessage(),
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to fetch members!',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
