@extends('layouts.app')

@section('content')

    <create-group-component : :group="{{$group}}" url-for-update-group="{{route('groups.update',['group'=>$group->id])}}"></create-group-component>

@endsection
