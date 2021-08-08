<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Group;
use App\Models\Group_to_user;
use App\Models\Priority;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class GroupController extends Controller
{

    public function index()
    {
        $id = Auth::id();

        $groups = Group::join('group_to_users', function($join) use ($id) {
            $join->on('groups.id', '=', 'group_to_users.group_id')->where('group_to_users.user_id', $id);
        })->get();

        return view('groups', ['groups'=>$groups]);
    }

    public function create()
    {
        return view('group_create');
    }

    public function store(Request $request)
    {
        $group = new Group();

        $group->name = $request->name;
        $group->count_people = $request->countPeople;
        $group->user_id = Auth::id();

        $group->save();

        $group_to_user = new Group_to_user();

        $group_to_user->group_id = $group->id;
        $group_to_user->user_id = Auth::id();

        $group_to_user->save();

        return route('groups.index');
    }

    public function edit($group)
    {
        $group = Group::find($group);
        $priorities = Priority::where('group_id', $group)->get();
        $categories = Category::where('group_id', $group)->get();

        return view('group_edit', ['group'=>$group, 'priorities'=>$priorities, 'categories'=>$categories]);
    }

    public function update($group, Request $request)
    {

    }

}
