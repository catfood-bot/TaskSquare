@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-3 bg-light border p-2 rounded h-100">
        <h5 class="mt-2 text-center">ユーザー一覧</h5>
        <div class="bg-white">
            @if(count($users) > 0)
                <ul class="list-group overflow-auto" style="height:500px;">
                    @foreach($users as $user)
                        <li class="list-group-item">
                            {{ $user->name }}
                            <span class="badge badge-secondary">{{ $user->tasks_count }}</span>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
    <div class="col-8 offset-1 bg-light border p-2 rounded h-100">
        <div class="bg-dark rounded">
        {!! Form::open(['route' => 'messages.store']) !!}
            <div class="form-group">
                <div class="m-2">
                {!! Form::label('body', 'メッセージ(必須) ※250文字以内', ['class' => 'form-check-label']) !!}
                {!! Form::textarea('body', old('body'), ['class' => 'form-control', 'rows' => '2', 'placeholder'=>'メッセージを入力してください']) !!}
                </div>
                {!! Form::submit('投稿', ['class' => 'btn btn-block btn-primary']) !!}
            </div>
        {!! Form::close() !!}
        </div>
        
        @if (count($messages) > 0)
            <ul class="list-unstyled overflow-auto" style="height:600px;"">
                @foreach ($messages as $message)
                    <li class="media mb-2 border rounded">
                        <div class="media-body p-1 bg-white">
                            <div>
                                <p class="h6 d-inline">{{ $message->user->name }}</p>
                                <span class="text-muted">{{ $message->created_at->format('Y年m月d日 H時i分') }}</span>
                            </div>
                            <div>
                                <p class="mb-2">{!! nl2br(e($message->body)) !!}</p>
                            </div>
                            <div>
                                @if (Auth::id() == $message->user_id)
                                    {!! Form::open(['route' => ['messages.destroy', $message->id], 'method' => 'delete']) !!}
                                        {!! Form::submit('削除する', ['class' => 'btn btn-danger btn-sm']) !!}
                                    {!! Form::close() !!}
                                @endif
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</div>
@endsection