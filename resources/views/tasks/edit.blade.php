@extends('layouts.app')

@section('content')

<div class="border rounded p-3 bg-light">

    {!! Form::model($task, ['route' => ['tasks.update', $task->id], 'method' => 'put']) !!}
        <div class="row">
            <div class="form-group col-8">
                {!! Form::label('title', 'タイトル(必須)') !!}
                {!! Form::text('title', old('title'), ['class' => 'form-control']) !!}
            </div>
        </div> 
            
        <div class="row">    
            <div class="form-group col-4">
                <legend class="col-form-label">優先度(必須)</legend>
                
                <div class="custom-control custom-radio custom-control-inline">
                    {{Form::radio('priority', '1.高', false, ['class'=>'custom-control-input','id'=>'priority1'])}}
                    {{Form::label('priority1','1.高',['class'=>'custom-control-label'])}}
                </div>
                
                <div class="custom-control custom-radio custom-control-inline">
                    {{Form::radio('priority', '2.中', true, ['class'=>'custom-control-input','id'=>'priority2'])}}
                    {{Form::label('priority2','2.中',['class'=>'custom-control-label'])}}
                </div>
                
                <div class="custom-control custom-radio custom-control-inline">
                    {{Form::radio('priority', '3.低', false, ['class'=>'custom-control-input','id'=>'priority3'])}}
                    {{Form::label('priority3','3.低',['class'=>'custom-control-label'])}}
                </div>
            </div>
        </div>
            
        <div class="row">    
            <div class="form-group col-4">
                <legend class="col-form-label">進捗(必須)</legend>
                
                <div class="custom-control custom-radio custom-control-inline">
                    {{Form::radio('progress', '未着手', false, ['class'=>'custom-control-input','id'=>'progress1'])}}
                    {{Form::label('progress1','未着手',['class'=>'custom-control-label'])}}
                </div>
                
                <div class="custom-control custom-radio custom-control-inline">
                    {{Form::radio('progress', '進行中', true, ['class'=>'custom-control-input','id'=>'progress2'])}}
                    {{Form::label('progress2','進行中',['class'=>'custom-control-label'])}}
                </div>
                
                <div class="custom-control custom-radio custom-control-inline">
                    {{Form::radio('progress', '完了', false, ['class'=>'custom-control-input','id'=>'progress3'])}}
                    {{Form::label('progress3','完了',['class'=>'custom-control-label'])}}
                </div>
            </div>
        </div>
        
        <div class="row">    
            <div class="form-group col-8">
                    {!! Form::label('finish', '期限(必須)') !!}
                    {!! Form::date('finish', null, ['class' => 'form-control']) !!}
            </div>
        </div>
        
        <div class="form-group">
            {!! Form::label('memo', 'メモ') !!}
            {!! Form::textarea('memo', null, ['class' => 'form-control', 'placeholder'=>'自由に記入してください']) !!}
        </div>

        {!! Form::submit('更新', ['class' => 'btn btn-primary']) !!}
        <a class="btn btn-secondary" href="/">キャンセル</a>

        {!! Form::close() !!}
        
</div>

@endsection