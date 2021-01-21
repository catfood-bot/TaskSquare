<ul class="nav nav-tabs justify-content-start nav-pills mt-2">
    <li class="nav-item">
        <a href="{{ route('tasks.index', ['task' => $task->id]) }}" class="nav-link {{ Request::routeIs('tasks.index') ? 'active' : '' }}">
            一覧
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('tasks.completed', ['task' => $task->id]) }}" class="nav-link {{ Request::routeIs('tasks.completed') ? 'active' : '' }}">
            完了済み
        </a>
    </li>