<?php

namespace App\Http\Controllers\API\v2\member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Task;
use Illuminate\Support\Str;

class ClassRoomTaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($roomId)
    {
        //
        $room = Room::where('type', 'class')->findOrFail($roomId);
        $tasks = $room->tasks()
            ->orderBy('created_at', 'desc')
            ->paginate();
        return response()->json($tasks);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($roomId, Request $request)
    {
        //
        $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
            // 'status' => 'nullable|string',
            // 'priority' => 'nullable|string',
            // opsi: document, quiz
            'type' => 'nullable|string|in:document,quiz',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
        ]);

        $room = Room::where('type', 'class')->findOrFail($roomId);
        $task = new Task();
        $task->uuid = Str::uuid();
        $task->fill($request->all());
        $room->tasks()->save($task);

        return response()->json([
            'message' => 'Task created successfully',
            'task' => $task
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($roomId, $taskId)
    {
        //
        $room = Room::where('type', 'class')->findOrFail($roomId);
        $task = $room->tasks()->findOrFail($taskId);
        return response()->json($task);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
