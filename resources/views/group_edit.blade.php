@extends('layouts.app')

@section('content')

    <create-group-component :categories="{{$categories}}"
                            :priorities="{{$priorities}}"
                            :group="{{$group}}"
                            url-for-priority="{{route('groups.priorities.store',['group'=>$group->id])}}"
                            url-for-category="{{route('groups.categories.store',['group'=>$group->id])}}"
                            url-for-update-group="{{route('groups.update',['group'=>$group->id])}}">
    </create-group-component>

@endsection
