{!! Form::model($task, ['route' => 'tasks.store']) !!}
    <div class="row">
            
        <div class= "form-group col-12 mb-0">
            {!! Form::label('title', 'タイトル(必須)', ['class' => 'form-check-label ml-3 mr-2']) !!}
            {!! Form::text('title', null, ['class' => 'form-control', 'placeholder'=>'タスクを入力してください']) !!}
        </div>
            
        <div class="form-group col-3 mb-1">
            
            <legend class="col-form-label label-priority">優先度(必須)</legend>
            
            <div class="custom-control custom-radio custom-control-inline">
                {{Form::radio('priority', '1.高', false, ['class'=>'custom-control-input','id'=>'priority1'])}}
                {{Form::label('priority1','1.高',['class'=>'custom-control-label label-radio'])}}
            </div>
            
            <div class="custom-control custom-radio custom-control-inline">
                {{Form::radio('priority', '2.中', true, ['class'=>'custom-control-input','id'=>'priority2'])}}
                {{Form::label('priority2','2.中',['class'=>'custom-control-label label-radio'])}}
            </div>
            
            <div class="custom-control custom-radio custom-control-inline">
                {{Form::radio('priority', '3.低', false, ['class'=>'custom-control-input','id'=>'priority3'])}}
                {{Form::label('priority3','3.低',['class'=>'custom-control-label label-radio'])}}
            </div>
            
        </div>
        
        <div class="form-group col-4 mb-1">
            
            <legend class="col-form-label label-progress">進捗(必須)</legend>
            
            <div class="custom-control custom-radio custom-control-inline">
                {{Form::radio('progress', '未着手', false, ['class'=>'custom-control-input','id'=>'progress1'])}}
                {{Form::label('progress1','未着手',['class'=>'custom-control-label label-radio'])}}
            </div>
            
            <div class="custom-control custom-radio custom-control-inline">
                {{Form::radio('progress', '進行中', true, ['class'=>'custom-control-input','id'=>'progress2'])}}
                {{Form::label('progress2','進行中',['class'=>'custom-control-label label-radio'])}}
            </div>
            
            <div class="custom-control custom-radio custom-control-inline">
                {{Form::radio('progress', '完了', false, ['class'=>'custom-control-input','id'=>'progress3'])}}
                {{Form::label('progress3','完了',['class'=>'custom-control-label label-radio'])}}
            </div>
            
        </div>
        
        <div class="form-group col-3 mb-1">
            {!! Form::label('finish', '期限(必須)', ['class' => 'form-check-label ml-2 mr-2']) !!}
            {!! Form::date('finish', null, ['class' => 'form-control']) !!}
        </div>
    {!! Form::submit('追加', ['class' => 'btn btn-create btn-primary mt-4']) !!}

    </div>

{!! Form::close() !!}
