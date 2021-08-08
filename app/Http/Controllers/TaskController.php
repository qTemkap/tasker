<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Friends_User;
use App\Models\Group;
use App\Models\Priority;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class TaskController extends Controller
{

    public function index($group = null)
    {
        if (!is_null($group)) {
            $tasks = Task::with('category')->where('group_id', $group)->get();


//            dd($tasks);
            return view('tasks_group', ['tasks'=>$tasks, 'group_id'=>$group]);
        } else {
            $tasks['tasks_for_creater'] = Task::where('user_id', Auth::id())->get();
            $tasks['tasks_for_executor'] = Task::where('executor_id', Auth::id())->get();

            return view('tasks', ['tasks'=>$tasks]);
        }
    }

    public function create($group = null)
    {
        $priority = Priority::where('group_id', $group)->get();
        $category = Category::where('group_id', $group)->get();
        $group = Group::where('id', $group)->first();
        $friends = Friends_User::getFriends();

        return view('task_create', ['group'=>$group,'priority'=>$priority, 'category'=>$category, 'friends'=>$friends]);
    }

    public function store($group, Request $request)
    {
        $task = new Task();

        $task->priority_id = $request->taskPriority;
        $task->name = $request->taskName;
        $task->title = $request->taskName;
        $task->category_id = $request->taskCategory;
        $task->executor_id = $request->taskExecutor;
        $task->user_id = Auth::id();
        $task->short_description = $request->taskShortDescription;
        $task->description = $request->taskDescription;
        $task->end = $request->taskEnd;
        $task->group_id = $group;

        $task->save();

        return route('groups.tasks.index', ['group'=>$group]);
    }

}
