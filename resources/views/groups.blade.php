@extends('layouts.app')

@section('content')

    @if(!empty($groups))
        <h2 class="text-center">Группы</h2>
        <br>
        <div class="container">
            <ul class="list-group">
                @foreach($groups as $group)
                    <a href="{{route('groups.tasks.index', ['group'=>$group->id])}}">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{$group->name}}
                            <span class="badge bg-primary rounded-pill">{{$group->tasks->count()}}</span>
                        </li>
                    </a>
                @endforeach
            </ul>
        </div>

    @else
        На данный момент, групп нет!
    @endif

@endsection
