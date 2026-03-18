<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Task;
use Auth;
use Carbon\Carbon;

class TaskController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'status' => 'required',
            'due_date' => 'required|date',
        ]);
        
        if ($validator->fails()) {
            return response()->json([
                'status' => 0,
                'message' => 'validation error',
                'data' => $validator->errors()
            ]);
        }

        $task = Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'due_date' => $request->due_date,
            'created_by' => Auth::user()->id,
        ]);

        $response = [];
        $response['title'] = $task->title;
        $response['description'] = $task->description;
        $response['status'] = $task->status;
        $response['due_date'] = $task->due_date;
        $response['created_by'] = $task->created_by;
        
        return response()->json([
            'status' => 1,
            'message' => 'Task created successfully',
            'data' => $response
        ]);
    }

    public function index(Request $request)
    {
        $query = Task::query();
        if ($request->has('status')) {
            $query->where('status', $request->status);
        }
        // Optional: pagination
        $tasks = $query->with('user')->orderBy('created_at', 'desc')->paginate(10);

        return response()->json([
            'status' => 1,
            'message' => 'Tasks fetched successfully',
            'data' => $tasks
        ]);
    }

    public function show($id)
    {
        $response = Task::find($id);
        
        return response()->json([
            'status' => 1,
            'message' => 'Tasks fetched successfully',
            'data' => $response
        ]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'status' => 'required',
            'due_date' => 'required|date',
        ]);
        
        if ($validator->fails()) {
            return response()->json([
                'status' => 0,
                'message' => 'validation error',
                'data' => $validator->errors()
            ]);
        }

        $product = Task::find($id);
        $product->title = $request->title;
        $product->description = $request->description;
        $product->status = $request->status;
        $product->due_date = $request->due_date;
        $product->save();
    
        return response()->json([
            'status' => 1,
            'message' => 'Task updated successfully',
            'data' => $product
        ]);
    }

    public function distroy($id)
    {
        $task = Task::find($id);

        if (!$task) {
            return response()->json([
                'status' => 0,
                'message' => 'Data not found'
            ]);
        }
        $task->delete();

        return response()->json([
            'status' => 1,
            'message' => 'Task deleted successfully',
            'data' => $task  // optional: you can return the deleted model
        ]);

    }

}
