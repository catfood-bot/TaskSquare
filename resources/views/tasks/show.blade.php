@extends('layouts.app')

@section('content')

    <div class="border rounded p-3 bg-light">
        <h4>{{ $task->title }}</h4>
        
        {!! link_to_route('tasks.edit', '編集', ['task' => $task->id], ['class' => 'btn btn-success float-left mr-2 mb-2']) !!}
        
        {!! Form::model($task, ['route' => ['tasks.destroy', $task->id], 'method' => 'delete']) !!}
            {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
        
            <table class="table table-bordered table-striped">
                <tr>
                    <th class="table-dark w-25">タイトル</th>
                    <td>{{ $task->title }}</td>
                </tr>
                <tr>
                    <th class="table-dark w-25">優先度</th>
                    <td>{{ $task->priority }}</td>
                </tr>
                <tr>
                    <th class="table-dark w-25">進捗</th>
                    <td>{{ $task->progress }}</td>
                </tr>
                <tr>
                    <th class="table-dark w-25">期限</th>
                    <td>{{ $task->finish }}</td>
                </tr>
                <tr>
                    <th class="table-dark w-25">メモ</th>
                    <td>{{ $task->memo }}</td>
                </tr>
            </table>
    </div>
    
@endsection