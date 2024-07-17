<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTodoRequest;
use App\Http\Resources\V1\TodoCollection;
use App\Models\Todo;
use App\Services\TodoService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TodoController extends Controller
{

    public function __construct(public TodoService $todoService)
    {

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(new TodoCollection(Todo::all()));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTodoRequest $request)
    {
        try {
            $this->todoService->create($request->all());
            return response()->json(['message' => 'Todo created'],200);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 400);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todo $todo)
    {
        try {
            $todo->delete();
            return response()->json(['message' => 'Todo deleted'], 200);
        } catch (ModelNotFoundException  $e) {
            return response()->json(['message' => $e->getMessage()], 404);
        }
    }
}
