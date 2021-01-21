<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Message;

use App\User;

use App\Task;


class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        if (\Auth::check()) {
            $task = new Task;
            $user = \Auth::user();
            // ユーザの投稿の一覧を進捗の降順、優先度の昇順、期限の昇順で取得
            $tasks = Task::where('progress', '!=', '完了')->orderByRaw('progress desc, priority asc, finish asc')->paginate(7);

            $data = [
                'user' => $user,
                'tasks' => $tasks,
                'task' => $task,
            ];
        }
        
        return view('welcome', $data);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'priority' => 'required',
            'finish' => 'date',
            'memo' => 'max:500',
            ]);
        
        $task = new Task;
        $task->user_id = $request->user()->id;
        $task->title = $request->title;
        $task->priority = $request->priority;
        $task->finish = $request->finish;
        $task->progress = $request->progress;
        $task->memo = $request->memo;
        $task->save();
        
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Task::findOrFail($id);
        if (\Auth::check()) {
            return view('tasks.show',[
                'task' => $task,
            ]);
        } else {
            return redirect('/');
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::findOrFail($id);
        
        if (\Auth::check()) {
            return view('tasks.edit',[
                'task' => $task,
            ]);
        } else {
            return redirect('/');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'priority' => 'required',
            'finish' => 'date|required',
            'memo' => 'max:500',
            ]);
        
        $task = Task::findOrFail($id);
        
        $task->title = $request->title;
        $task->priority = $request->priority;
        $task->finish = $request->finish;
        $task->progress = $request->progress;
        $task->memo = $request->memo;
        $task->save();
        
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        
        if (\Auth::id() === $task->user_id) {
            $task->delete();
        }
        
        return redirect('/');
    }
    
    public function completed()
    {
        $data = [];
        if (\Auth::check()) {
            $task = new Task;
            $user = \Auth::user();
            // 完了済みのタスクを期限の降順,優先度の昇順で取得
            $tasks = Task::where('progress', '完了')->orderByRaw('finish desc, priority asc')->paginate(7);

            $data = [
                'user' => $user,
                'tasks' => $tasks,
                'task' => $task,
            ];
        }
        
        return view('tasks.completed', $data);
    }
    
    
}
