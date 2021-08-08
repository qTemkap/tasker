@extends('layouts.app')

@section('content')

    <task-create-component
        :friends-list="{{$friends}}"
        :category-list="{{$category}}"
        :priority-list="{{$priority}}"
        :group="{{$group}}"
        save-task="{{route('groups.tasks.store', ['group'=>$group->id])}}"
    >
    </task-create-component>

@endsection
