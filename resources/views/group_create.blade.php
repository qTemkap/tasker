@extends('layouts.app')

@section('content')

    <create-group-component :group="{{collect()}}" url-for-create-group="{{route('groups.store')}}"></create-group-component>

@endsection
