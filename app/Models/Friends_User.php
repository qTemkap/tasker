<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Friends_User extends Model
{
    use HasFactory;

    public static function getFriends()
    {
        $id = Auth::id();
        $list = User::select('users.*')->leftJoin('friends__users as t1', function($leftJoin) {
            $leftJoin->on('t1.user_second', 'users.id');
        })->leftJoin('friends__users as t2', function($leftJoin) {
            $leftJoin->on('t2.user_first', 'users.id');
        })->where('t1.user_first', $id)->orWhere('t2.user_second', $id)->get();

        return $list;
    }
}
