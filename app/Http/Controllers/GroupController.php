<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GroupController extends Controller
{

    public function index()
    {
        $id = Auth::id();

        $groups = Group::where('groups.id', '>', 0)->join('group_to_users', function($join) use ($id) {
            $join->on('groups.id', '=', 'group_to_users.group_id')->where('group_to_users.user_id', $id);
        })->get();

        return view('groups', ['groups'=>$groups]);
    }

}
