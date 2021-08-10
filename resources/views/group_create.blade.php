@extends('layouts.app')

@section('content')

    <create-group-component :categories="{{collect()}}" :priorities="{{collect()}}" :group="{{collect()}}" url-for-priority="" url-for-category="" url-for-create-group="{{route('groups.store')}}"></create-group-component>

@endsection
