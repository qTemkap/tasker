@extends('layouts.app')

@section('content')

    <div class="row">
        <tasks-group-component :tasks="{{$tasks}}"></tasks-group-component>
    </div>

@endsection
