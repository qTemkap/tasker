<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{

    public function index($group = null)
    {
        if (!is_null($group)) {
            $tasks = Task::with('category')->where('group_id', $group)->get();

            return view('tasks_group', ['tasks'=>$tasks]);
        } else {
            $tasks['tasks_for_creater'] = Task::where('user_id', Auth::id())->get();
            $tasks['tasks_for_executor'] = Task::where('executor_id', Auth::id())->get();

            return view('tasks', ['tasks'=>$tasks]);
        }
    }

}
