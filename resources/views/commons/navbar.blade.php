<header class="mb-4">
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        
        {!! link_to_route('tasks.index', 'TaskSquare', [], ['class' => 'navbar-brand']) !!}

        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav">
                @if (Auth::check())
                    <li class="nav-item">
                        {!! link_to_route('messages.index', 'メッセージ', [], ['class' => 'nav-link text-white']) !!}
                    </li>
                    
                    <li class="nav-item">
                        {!! link_to_route('users.edit', 'ユーザー情報編集',  ['user' => Auth::user()->id], ['class' => 'nav-link text-white']) !!}
                    </li>
                
                    <li class="nav-item">
                            {!! link_to_route('logout.get', 'ログアウト', [], ['class' => 'nav-link text-danger']) !!}
                    </li>
                @else
                    <li class="nav-item">
                        {!! link_to_route('signup.get', '新規登録', [], ['class' => 'nav-link text-white']) !!}
                    </li>
                    <li class="nav-item">
                        {!! link_to_route('login', 'ログイン', [], ['class' => 'nav-link text-primary']) !!}
                    </li>
                @endif
            </ul>
        </div>
    </nav>
</header>