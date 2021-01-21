<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Message;

use App\User;

class MessagesController extends Controller
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
            $message = new Message;
            $users = User::orderBy('name', 'asc')->get();
            $user = \Auth::user();
            $messages = Message::orderBy('created_at', 'desc')->get();

            $data = [
                'user' => $user,
                'users' => $users,
                'messages' => $messages,
            ];
        }
        
        return view('messages.index', $data);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'body' => 'required|max:250',
            ]);
        
        $message = new Message;
        $message->user_id = $request->user()->id;
        $message->body = $request->body;
        $message->save();
        
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $message = Message::findOrFail($id);
        
        if (\Auth::id() === $message->user_id) {
            $message->delete();
        }
        
        return back();
    }
}
