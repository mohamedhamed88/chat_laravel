<?php

namespace App\Http\Controllers;

use App\Message;
use App\User;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $user_id = auth()->user()->id;
        $receiver = User::find($id);
        $messages = Message::where('user_id', $user_id)->where('receiver_id', $id)->get();
        return view('chat', compact('messages', 'receiver'));
    }
    public function getmessage($id)
    {
        $user_id = auth()->user()->id;
        //$receiver = User::find($id);
        $messages = Message::where('user_id', $user_id)->where('receiver_id', $id)->get();
        return json_encode($messages);
    }
    public function sendMessage(Request $request)
    {
        Message::create([
            'message' => $request->data['message'],
            'receiver_id' => $request->data['receiver'],
            'user_id' => $request->data['sender'],

        ]);
        return $request->data;
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        //
    }
}
