@extends('layouts.app')

@section('style')

@endsection

@section('content')


{{--    <example-component></example-component>--}}

{{--    <div class="row justify-content-center">--}}
        <div class="col-md-8">
            <div class="row">
                <example-component></example-component>
            </div>
{{--            <div class="card">--}}
{{--                <div class="card-header">{{ __('Dashboard') }}</div>--}}

{{--                <div class="card-body">--}}
{{--                    @if (session('status'))--}}
{{--                        <div class="alert alert-success" role="alert">--}}
{{--                            {{ session('status') }}--}}
{{--                        </div>--}}
{{--                    @endif--}}



{{--                    {{ __('You are logged in!') }}--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>
@endsection
