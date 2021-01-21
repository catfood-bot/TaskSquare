@if (count($tasks) > 0)
    <table class="table table-sm table-striped table-bordered">
        <tbody>
            @foreach ($tasks as $task)
            <tr>
                <td>
                    <a class="taskTitle" href="{{ route('tasks.show', ['task' => $task->id]) }}">{{ $task->title }}</a>
                </td>
            </tr>
            
            <tr>
                <td class="pl-5">
                    <span class="mr-4">進捗： {{ $task->progress }}</span>
                    <span class="mr-4">優先度： {{ $task->priority }}</span>
                    <span class="mr-4">期限： {{ $task->finish }}</span>
                    <span class="mr-4">担当者： {{ $task->user->name }}</span>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endif
    
{{ $tasks->links() }}
    