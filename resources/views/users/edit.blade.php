@extends('layouts.app')

@section('content')

<div class="row border rounded p-3 bg-light">
        <div class="col-8">
            {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'put']) !!}

                <div class="form-group">
                    {!! Form::label('name', '名前:') !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('email', 'メールアドレス:') !!}
                    {!! Form::email('email', null, ['class' => 'form-control']) !!}
                </div>
                
                {!! Form::submit('更新', ['class' => 'btn btn-primary']) !!}
                <a class="btn btn-secondary" href="/">キャンセル</a>

            {!! Form::close() !!}
        </div>
    </div>

@endsection