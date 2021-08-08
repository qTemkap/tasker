<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Task extends Model
{
    protected $appends =[
        'is_executor'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getIsExecutorAttribute()
    {
        return ($this->executor == Auth::id())?true:false;
    }

}
