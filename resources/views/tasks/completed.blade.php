@extends('layouts.app')

@section('content')

@if (Auth::check())
    <div class="bg-white rounded p-3 w-auto">
        <div class="bg-dark pl-2 pr-2 rounded">
            @include('tasks.create')
        </div>
        @include('tasks.navtabs')    
        @include('tasks.indexCompleted')
    </div>        
@else

    <div class="center jumbotron">
        <div class="text-center">
            <h1>original</h1>
            
            {!! link_to_route('signup.get', '新規登録', [], ['class' => 'btn btn-lg btn-primary']) !!}
            {!! link_to_route('login', 'ログイン', [], ['class' => 'btn btn-lg btn-primary']) !!}
        </div>
    </div>
    
@endif

@endsection