@extends('layouts.app')

@section('content')

    <h2 class="text-center"><button onclick="var url = $(this).data('url'); window.location.href = url;" data-url="{{route('groups.tasks.create', ['group'=>$group_id])}}" type="button" class="btn btn-success">Создать задачу</button></h2>
    <br>
    <div class="row">
        <tasks-group-component :tasks="{{$tasks}}"></tasks-group-component>
    </div>

@endsection
